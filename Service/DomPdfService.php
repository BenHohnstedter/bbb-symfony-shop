<?php

namespace App\Service;

use App\Repository\OrderingRepo;
use Dompdf\Dompdf;

class DomPdfService implements \App\Interface\PdfServiceInterface
{
    public function __construct(
        protected Dompdf $dompdf,
        protected OrderingRepo $orderingRepo,
    ) {
    }

    public function createPdf($ordering): void
    {
        $this->dompdf->setPaper('A4');

        $html = file_get_contents('Template/billTemplate.html');

        $products = $this->createProductsTable($ordering);

        $html = str_replace(
            [
                '{{ firstname }}',
                '{{ lastname }}',
                '{{ street }}',
                '{{ houseNumber }}',
                '{{ postalCode }}',
                '{{ city }}',
                '{{ email }}',
                '{{ date }}',
                '{{ payable }}',
                '{{ orderid }}',
                '{{ uid }}',
                '{{ products }}',
                '{{ totalPrice }}',
            ],
            [
                $ordering->getUser()->getFirstname(),
                $ordering->getUser()->getLastname(),
                $ordering->getUser()->getStreet(),
                $ordering->getUser()->getHouseNumber(),
                $ordering->getUser()->getPostalCode(),
                $ordering->getUser()->getCity(),
                $ordering->getUser()->getEmail(),
                date('d.m.Y', time()),
                date('d.m.Y', time() + 86400 * 14),
                sprintf('%05d', $ordering->getId()),
                sprintf('%05d', $ordering->getUser()->getId()),
                $products[0],
                $products[1],
            ],
            $html
        );

        $this->dompdf->loadHtml($html);

        $this->dompdf->render();

        $this->dompdf->addInfo('Title', 'Kaufrechnung von Bens Batterien Börse');
        $this->dompdf->addInfo('Author', 'Ben Hohnstedter');

        //        $this->dompdf->stream('Rechnung-'.$ordering->getId().'.pdf'); #, ["Attachment" => 0]

        $output = $this->dompdf->output();

        $pdfName = 'bill-'.$ordering->getId().'-'.$ordering->getUser()->getId().'.pdf';
        file_put_contents('Resource/Bill/'.$pdfName, $output);

        $this->orderingRepo->setPdf($ordering->getId(), $pdfName);
    }

    private function createProductsTable($ordering): array
    {
        $table = null;
        $totalPrice = null;

        foreach ($ordering->getOrderingItems() as $product) {
            $unitPrice = floatval(str_replace(',', '.', $product->getProduct()->getPrice()));
            $combinedPrice = $unitPrice * $product->getAmount();
            $totalPrice += $unitPrice * $product->getAmount();
            $table .= "<tr>
                            <td class='product-item-1'>".$product->getProduct()->getName()."</td>
                            <td class='product-item-2'>".number_format($unitPrice, 2)."</td>
                            <td class='product-item-3'>".$product->getAmount()." Stk.</td>
                            <td class='product-item-4'>".number_format($combinedPrice, 2).'</td>
                        </tr>';
        }

        $totalPrice = str_replace('.', ',', number_format($totalPrice + 5, 2));

        return [$table, $totalPrice];
    }
}

<?php

namespace App\Builder;

use Dompdf\Dompdf;
use Dompdf\Options;

require 'vendor/autoload.php';

class DomPdfBuilder
{
    private Options $options;

    public function __construct()
    {
        $this->options = new Options();
    }

    public function chroot(string $chroot): void
    {
        $this->options->setChroot($chroot);
    }

    public function remoteEnabled(bool $value): void
    {
        $this->options->setIsRemoteEnabled($value);
    }

    public function build(): Dompdf
    {
        return new Dompdf($this->options);
    }
}

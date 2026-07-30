<?php

namespace App\Form\Type;

use App\Repository\CategoryRepo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductFormType extends AbstractType
{
    public function __construct(
        protected CategoryRepo $categoryRepo,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $categories = [];
        foreach ($this->categoryRepo->findAll() as $value) {
            $categories += [
                $value->getName() => $value->getId(),
            ];
        }

        $builder
            ->add('name', TextType::class,
                [
                    'attr' => [
                        'autocomplete' => 'off',
                        // 'value' => 'Default value',
                    ],
                ])

            ->add('imagePath', FileType::class,
                [
                    'required' => false,
                    'data_class' => null,
                ])

            ->add('price', MoneyType::class,
                [
                    'attr' => [
                        'autocomplete' => 'off',
                        // 'value' => '100',
                    ],
                ])

            ->add('category', ChoiceType::class,
                [
                    'choices' => $categories,
                ])

            ->add('amount', IntegerType::class,
                [
                    'attr' => [
                        'autocomplete' => 'off',
                        // 'value' => '1000',
                    ],
                ])

            ->add('description', TextareaType::class)

            ->add('save', SubmitType::class);
    }
}

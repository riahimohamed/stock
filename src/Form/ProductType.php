<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\category;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qrcode', HiddenType::class, [
                'data' => 'dfg654dfg4se',
                ])
            ->add('label', null)
            ->add('ref')
            ->add('ref_provider')
            ->add('maker')
            ->add('ref_maker')
            ->add('description', TextareaType::class)
            ->add('danger', ChoiceType::class, [
                'placeholder' => 'Dangereux',
                'choices' => [
                    'Non' => true,
                    'Oui' => false,
                ],
            ])
            ->add('category', EntityType::class, [
                'class' => category::class,
                'placeholder' => 'Catégories',
                'label' => 'false',
            ])
            ->add('price', NumberType::class)
            ->add('unit', ChoiceType::class, [
                'choices' => [
                    'Unité' => null,
                    'US' => 'us',
                    'EURO' => 'euro',   
                    'DINAR' => 'dinar',
                ],
            ])
            ->add('color', null, [
                'required'   => false,
            ])
            ->add('weight', NumberType::class, [
                'required'   => false,
            ])
            ->add('size', NumberType::class, [
                'required'   => false,
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'data_class' => null,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}

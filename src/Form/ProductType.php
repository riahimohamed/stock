<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Provider;

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
                'data' => 'yytt654rt',
                ])
            ->add('label', null)
            ->add('ref')
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
            ->add('provider', EntityType::class, [
                'class' => Provider::class,
                'choice_label' => 'name',
                'placeholder' => 'Fournisseur',
                'label' => 'false',
            ])
            ->add('price', NumberType::class)
            ->add('unit', ChoiceType::class, [
                'placeholder' => 'Devise',
                'choices' => [
                    '$ (USD)' => 'usd',
                    '€ (EUR)' => 'euro',   
                    'ت.د (TND)' => 'tnd',
                ],
            ])
            ->add('step')
            ->add('color', null, [
                'required'   => false,
            ])
            ->add('amount', NumberType::class)
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

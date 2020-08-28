<?php

namespace App\Form;

use App\Entity\AdjustStocks;
use App\Entity\Location;
use App\Entity\Product;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdjustStocksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location', EntityType::class, [
                'class' => location::class,
                'placeholder' => 'Emplacement',
                'label' => 'false',
            ])
            ->add('Raison', ChoiceType::class, [
                'choices' => [
                    'Entrée' => 'Entrée',
                    'Sortie' => 'Sortie',
                    'Retour' => 'Retour',
                    'Cassé' => 'Cassé',
                ],
                'placeholder' => 'Raison',
            ])
            ->add('notes')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Client/Projet' => 'Client/Projet',
                    'Fournisseur/Projet' => 'Fournisseur/Projet',
                ],
                'placeholder' => 'Client/Projet Fournisseur/Projet',
            ])
            ->add('product', EntityType::class, [
                'class' => Product::class,
                'choice_label' => 'ref',
                'placeholder' => 'Produit',
                'label' => 'false',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AdjustStocks::class,
        ]);
    }
}

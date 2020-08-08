<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Particulier' => 'particulier',
                    'Entreprise' => 'entreprise',
                ],
                'placeholder' => 'Particulier ou entreprise',
            ])
            ->add('ref')
            ->add('account_name')
            ->add('type_contact', ChoiceType::class, [
                'choices' => [
                    'Client' => 'client',
                    'Fournissuer' => 'fournisseur',
                ],
                'placeholder' => 'Type de contact',
            ])
            ->add('name')
            ->add('mobile')
            ->add('fixe')
            ->add('fax')
            ->add('email')
            ->add('image', FileType::class, [
                'required' => false,
                'data_class' => null,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}

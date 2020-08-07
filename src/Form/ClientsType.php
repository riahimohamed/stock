<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location')
            ->add('type')
            ->add('priority')
            ->add('no_command')
            ->add('type_delivery')
            ->add('mode_pay')
            ->add('qrcode')
            ->add('percent_pay')
            ->add('nb_pallet')
            ->add('date_command')
            ->add('date_prepar')
            ->add('date_pay')
            ->add('date_submit')
            ->add('comment_command')
            ->add('comment_delivery')
            ->add('total_weight')
            ->add('total_amount')
            ->add('total_price')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}

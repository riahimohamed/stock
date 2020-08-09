<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use App\Entity\CommandClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('locale', null,   [
                'required' => true,
            ])
            ->add('type')
            ->add('priority', ChoiceType::class, [
                'placeholder' => 'Priorité',
                'choices' => [
                    'Medium' => 'Medium',
                    'Basse' => 'Basse',
                    'Trés lent' => 'Trés lent',
                    'Haute' => 'Haute',
                ],
            ])
            ->add('nocmd')
            ->add('typeDelivery')
            ->add('modePay', ChoiceType::class, [
                'placeholder' => 'Mode de paiment',
                'choices' => [
                    'Virement bancaire' => 'Virement bancaire',
                    'Paypal' => 'Paypal',
                ],
            ])
            ->add('percentPay')
            ->add('dateCmd', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('datePreparation', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('datePay', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateSumit', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('commentCmd')
            ->add('commentDelivery')
            ->add('totalWeight')
            ->add('totalAmount')
            ->add('totalPrice')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CommandClient::class,
        ]);
    }
}

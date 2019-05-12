<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;

class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('nameCompany')
            ->add('place')
            ->add('postCode', NumberType::class)
            ->add('duration', DateIntervalType::class, [
                'widget' => 'choice',
                'with_years' => true,
                'with_months' => true,
                'with_days' => false,
                'with_weeks' => true,
                'placeholder' => [
                    'years' => 'Années',
                    'months' => 'Mois',
                    'weeks' => 'Semaines'
                ],
                'labels' => [
                    'years' => 'Années',
                    'months' => 'Mois',
                    'weeks' => 'Semaines'
                ]
            ])
            ->add('year', DateType::class, [
                'widget' => 'choice',
                'years' => range (date('Y'), date('Y')-20)
            ])
            ->add('content');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}

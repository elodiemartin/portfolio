<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,  [
                'required' => true,
                'constraints' => new Length([
                    'max' => 75,
                    'maxMessage' => 'Votre nom doit contenir au maximum {{ limit }} caractères']),
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'constraints' => [ 
                    new Length([
                        'max' => 150,
                        'maxMessage' => 'Votre email doit contenir au maximum {{ limit }} caractères'
                    ]),
                    new Assert\Email(),
                ],
            ])
            ->add('subject', TextType::class, [
                'required' => true,
                'constraints' => new Length([
                    'min' => 6,
                    'minMessage' => 'Votre sujet doit contenir au moins {{ limit }} caractères',
                    'max' => 150,
                    'maxMessage' => 'Votre sujet doit contenir au maximum {{ limit }} caractères']),
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'constraints' => new Length([
                    'min' => 10,
                    'minMessage' => 'Votre message doit contenir au moins {{ limit }} caractères',
                    'max' => 255,
                    'maxMessage' => 'Votre message doit contenir au maximum {{ limit }} caractères']),
            ])
            ->add('send', SubmitType::class)
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

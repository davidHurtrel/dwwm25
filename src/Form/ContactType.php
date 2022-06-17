<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'required' => true,
                'attr' => [
                    'maxLength' => 45
                ]
            ])
            ->add('lastName', TextType::class, [
                'attr' => [
                    'maxLength' => 80
                ]
            ])
            ->add('age', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 130,
                    'step' => 1
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'maxLength' => 100
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'maxLength' => 2000
                ]
            ])
            ->add('files', FileType::class, [
                'required' => false,
                'multiple' => true,
                // 'mapped' => false,
                'help' => 'PNG, JPG, JPEG, JP2, WEBP ou PDF - 2 Mo maximum',
                'constraints' => [
                    new All(
                        new File([
                            'maxSize' => '500k',
                            'maxSizeMessage' => 'Un des fichiers est trop volumineux ({{ size }} {{ suffix }}). La taille maximum autorisée est de {{ limit }} {{ suffix }}.',
                            'mimeTypes' => [
                                // 'image/*',
                                'image/png',
                                'image/jpg',
                                'image/jpeg',
                                'image/jp2',
                                'image/webp',
                                'application/pdf',
                            ],
                            'mimeTypesMessage' => 'Le format d\'un fichier est invalide ({{ type }}). Les types autorisés sont : {{ types }}'
                        ])
                    )
                ]
            ])
            // ->add('send', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

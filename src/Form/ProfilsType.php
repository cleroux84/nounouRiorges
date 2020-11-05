<?php

namespace App\Form;

use App\Entity\Profils;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProfilsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('NumeroRueAdresse')
            ->add('code_postal')
            ->add('complementAdresse')
            ->add('villeAdresse')
            ->add('telephone')
            ->add('presentationText', TextareaType::class, [
                'row_attr' => ['class' => 'text-editor', 'id' => '...'],
                'attr' => ['class' => 'tinymce'],])
            ->add('Animaux', ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ]
            ])
            ->add('photo1', FileType::class, [
                'label' => 'Vous pouvez ajouter jusqu\'à 4 photos - photo 1 :',

                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'maxSizeMessage' => 'Image trop volumineuse - maximum autorisé : 1Mo',
                        'mimeTypesMessage' => 'Merci d\'insérer une photo au format jpeg, jpg ou png',
                    ])
                ],
            ])  
            ->add('photo2', FileType::class, [
                'label' => 'photo 2 :',

                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'maxSizeMessage' => 'Image trop volumineuse - maximum autorisé : 1Mo',
                        'mimeTypesMessage' => 'Merci d\'insérer une photo au format jpeg, jpg ou png',
                    ])
                ],
            ])  
            ->add('photo3', FileType::class, [
                'label' => 'photo 3 :',

                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'maxSizeMessage' => 'Image trop volumineuse - maximum autorisé : 1Mo',
                        'mimeTypesMessage' => 'Merci d\'insérer une photo au format jpeg, jpg ou png',
                    ])
                ],
            ])  

            ->add('photo4', FileType::class, [
                'label' => 'photo 4 :',

                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'maxSizeMessage' => 'Image trop volumineuse - maximum autorisé : 1Mo',
                        'mimeTypesMessage' => 'Merci d\'insérer une photo au format jpeg, jpg ou png',
                    ])
                ],
            ])  
            ->add('photoIdentite', FileType::class, [
                'label' => 'Choisissez votre photo de profil',

                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'maxSizeMessage' => 'Image trop volumineuse - maximum autorisé : 1Mo',
                        'mimeTypesMessage' => 'Merci d\'insérer une photo de profil au format jpeg, jpg ou png',
                    ])
                ],
            ])  
            ->add('AgrementDate', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('placeDispo', ChoiceType::class, [
                'choices' => [
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
            ],        
            ])
            ->add('tarifHoraire')
            ->add('tarifEntretien')
            ->add('experience', ChoiceType::class, [
                'choices' => [
                    '< 6 mois' => '< 6 mois',
                    '6 mois - 1 an' => '6 mois - 1 an',
                    '1 - 2 ans' => '1 - 2 ans',
                    '2 - 5 ans' => '2 - 5 ans',
                    '5 - 10 ans' => '5 - 10 ans',
                    '+ 10 ans' => '+ 10 ans',
            ],        
            ])
            ->add('horaires')
            ->add('formationPremierSecours', ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ]
            ])
            ->add('bafa', ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ]
            ])
            ->add('formationPetiteEnfance', ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ]
            ])
            ->add('permisConduire', ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ]
            ])
            ->add('vehicule', ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ]
            ])
            ->add('languesParlees')
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profils::class,
        ]);
    }
}

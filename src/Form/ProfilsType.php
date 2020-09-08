<?php

namespace App\Form;

use App\Entity\Profils;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('ville')
            ->add('email')
            ->add('NumeroRueAdresse')
            ->add('code_postal')
            ->add('complementAdresse')
            ->add('villeAdresse')
            ->add('telephone')
            ->add('presentationText')
            ->add('Animaux')
            ->add('photo1')
            ->add('photo2')
            ->add('photo3')
            ->add('photo4')
            ->add('photoIdentite')
            ->add('AgrementDate')
            ->add('placeDispo')
            ->add('tarifHoraire')
            ->add('tarifEntretien')
            ->add('experience')
            ->add('horaires')
            ->add('formationPremierSecours')
            ->add('bafa')
            ->add('formationPetiteEnfance')
            ->add('permisConduire')
            ->add('vehicule')
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

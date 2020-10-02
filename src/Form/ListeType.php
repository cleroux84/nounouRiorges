<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ListeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('selectChoices', ChoiceType::class, [
            'choices' => [
                'Nombre de place disponible' => 'placeDispo',
                'Tarif horaire' => 'tarifHoraire',
                'Date de fin d\'agrément' => 'AgrementDate',
            ],
       
        ])
       ;
    }

}
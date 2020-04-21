<?php

namespace App\Form;

use App\Entity\Technician;
use App\Entity\Intervention;
use App\Entity\TypeIntervention;
use App\Entity\EquipmentIncomplete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('session_user')
            ->add('password')
            ->add('client')
            ->add('date_depot')
            ->add('date_restitution')      
            ->add('equipment')
            ->add('OS') 
            ->add('observation')
 
        ;
        $builder->add('technicians', EntityType::class, array(
            'class' => Technician::class,
            'by_reference' => false,
            'choice_label' => 'firstname',
            'multiple' => true,
        ));

        $builder->add('equipmentIncompletes', EntityType::class, array(
            'class' => EquipmentIncomplete::class,
            'by_reference' => false,
            'choice_label' => 'name',
            'multiple' => true,
        ));

        $builder->add('typeInterventions', EntityType::class, array(
            'class' => TypeIntervention::class,
            'by_reference' => false,
            'choice_label' => 'name',
            'multiple' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}

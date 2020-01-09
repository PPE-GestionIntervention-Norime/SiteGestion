<?php

namespace App\Form;

use App\Entity\Intervention;
use App\Entity\Observation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
            ->add('equipmentIncompletes')
            ->add('OS') 
            //->add('interventionTypes')
            ->add('technicians')
            ->add('observation')
 
        ;
        /*$builder->add('observation', CollectionType::class, array(
            'entry_type' => ObservationType::class,
            'entry_options' => array('label' => false),
        ));*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}

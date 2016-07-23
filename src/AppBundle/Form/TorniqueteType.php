<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TorniqueteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $opcionesMarcas = array(
            'class' => 'AppBundle:Marca',
            'attr'  => array(
                'class' => 'select2-combo'
            ),
            'expanded' => false
        );

        $opcionesEnviar = array( 
            'attr' => array(
                'class' => 'btn waves-effect waves-light'
            )
        );

        $builder
            ->add('cantidad', IntegerType::class)
            ->add('marca', EntityType::class, $opcionesMarcas)
            ->add('crear', SubmitType::class, $opcionesEnviar)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $opciones = array(
            'data_class' => 'AppBundle\Entity\Torniquete'
        );

        $resolver->setDefaults($opciones);
    }
}

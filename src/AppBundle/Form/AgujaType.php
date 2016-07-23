<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgujaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $opcionesMarca = array(
            'class' => 'AppBundle:Marca', 
            'attr'  => array(
                'class' => 'browser-default'
            )
        );

        $opcionesVencimiento = array(
            'label'  => 'Fecha de vencimiento',
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd', 
            'attr'   => array(
                'class' => 'datepicker'
            )
        );

        $opcionesEnviar = array( 
            'attr'  => array(
                'class' => 'btn waves-effect waves-light'
            )
        );

        $builder
            ->add('nombre', TextType::class)
            ->add('capacidad', NumberType::class)
            ->add('vencimiento', DateType::class, $opcionesVencimiento)
            ->add('cantidad', IntegerType::class)
            ->add('marca', EntityType::class, $opcionesMarca)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $opciones = array(
            'data_class' => 'AppBundle\Entity\Aguja'
        );

        $resolver->setDefaults($opciones);
    }
}

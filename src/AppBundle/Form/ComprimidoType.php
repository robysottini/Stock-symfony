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

class ComprimidoType extends AbstractType
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
                'class' => 'select2-combo'
            )
        );

        $opcionesPrincipioActivo = array(
            'class' => 'AppBundle:PrincipioActivo', 
            'attr'  => array(
                'class' => 'select2-combo'
            )
        );

        $opcionesVencimiento = array(
            'label'  => 'Fecha de vencimiento',
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd'
        );

        $opcionesEnviar = array( 
            'attr'  => array(
                'class' => 'btn waves-effect waves-light'
            )
        );

        $builder
            ->add('nombre', TextType::class)
            ->add('marca', EntityType::class, $opcionesMarca)
            ->add('principioActivo', EntityType::class, $opcionesPrincipioActivo)
            ->add('peso', NumberType::class)
            ->add('vencimiento', DateType::class, $opcionesVencimiento)
            ->add('lote', TextType::class)
            ->add('cantidad', IntegerType::class)
            ->add('crear', SubmitType::class, $opcionesEnviar)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $opciones = array(
            'data_class' => 'AppBundle\Entity\Comprimido'
        );

        $resolver->setDefaults($opciones);
    }
}

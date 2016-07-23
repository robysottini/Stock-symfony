<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuanteType extends AbstractType
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

        $opcionesDescripcion = array(
            'label' => 'Descripción'
        );

        $opcionesVencimiento = array(
            'label'  => 'Fecha de vencimiento',
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd'
        );

        $opcionesLibreDeTalco = array(
            'label'    => 'Libre de talco',
            'required' => false
        );

        $opcionesEnviar = array( 
            'attr' => array(
                'class' => 'btn waves-effect waves-light'
            )
        );

        $builder
            ->add('marca', EntityType::class, $opcionesMarca)
            ->add('descripcion', TextType::class, $opcionesDescripcion)
            ->add('vencimiento', DateType::class, $opcionesVencimiento)
            ->add('libreDeTalco', CheckboxType::class, $opcionesLibreDeTalco)
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
            'data_class' => 'AppBundle\Entity\Guante'
        );

        $resolver->setDefaults($opciones);
    }
}

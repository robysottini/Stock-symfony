<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
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

        $builder
            ->add('cantidad')
            ->add('marca', null, $opcionesMarcas)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Torniquete'
        ));
    }
}

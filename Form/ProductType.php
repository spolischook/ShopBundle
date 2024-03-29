<?php

namespace Serge\ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('id_category', 'entity', array(
            'class' => 'ShopBundle:Category',
            'property' => 'name',
        ))
            ->add('price', 'money', array(
            'currency' => 'UAH'
        ))
            ->add('weight')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Serge\ShopBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'serge_shopbundle_producttype';
    }
}

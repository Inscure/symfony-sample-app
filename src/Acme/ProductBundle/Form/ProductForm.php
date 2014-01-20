<?php

namespace Acme\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'form.product.name'))
            ->add('description', 'textarea', array('label' => 'form.description'))
            ->add('price', 'money', array('label' => 'form.price', 'currency' => 'PLN'))
  
            ->add('save', 'submit', array('label' => 'form.save'));
    }
    
    public function getName() 
    {
        return 'productForm';
    }
}
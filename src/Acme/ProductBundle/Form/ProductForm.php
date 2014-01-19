<?php

namespace Acme\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
  
            ->add('save', 'submit');
    }
    
    public function getName() 
    {
        return 'productForm';
    }
}
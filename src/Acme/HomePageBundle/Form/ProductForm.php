<?php

namespace Acme\HomePageBundle\Form;

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
            //->add('dueDate', null, array('widget' => 'single_text'))
            ->add('save', 'submit');
    }
    
    public function getName() 
    {
        return 'productForm';
    }
}
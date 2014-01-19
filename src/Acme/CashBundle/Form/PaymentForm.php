<?php

namespace Acme\CashBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PaymentForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('max_length' => 30, 'label' => 'form.name'))
            ->add('surname', null, array('label' => 'form.surname'))
            ->add('city', null, array('label' => 'form.city'))
            ->add('street', null, array('label' => 'form.street'))
            ->add('number', 'number', array('label' => 'form.number'))
            ->add('save', 'submit', array('label' => 'form.save'));
    }
    
    public function getName() 
    {
        return 'productForm';
    }
}
<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
    
class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
   	$builder->add('firstname', 'text');
        $builder->add('lastname', 'text');
        $builder->add('email', 'email');
   	$builder->add('username', 'text');
   	
    }
    public function getName()
    {
        return 'account';
    }
}
?>
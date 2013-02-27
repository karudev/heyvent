<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
    
class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
  
        $builder->add('idEvent', 'hidden');
   	$builder->add('comment', 'textarea');
   	
    }
    public function getName()
    {
        return 'comment';
    }
}
?>
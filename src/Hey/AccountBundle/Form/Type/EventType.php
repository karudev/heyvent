<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
    
class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
  
   	$builder->add('name', 'text');
        $builder->add('presentation', 'text',array('required'=>false));
        $builder->add('dateBegin', 'text');
        $builder->add('dateEnd', 'text',array('required'=>false));
   	$builder->add('description', 'textarea');
   	
    }
    public function getName()
    {
        return 'event';
    }
}
?>
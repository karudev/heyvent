<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AccounthobbiesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

       
        $builder->add('value', 'text');
    }

    public function getName() {
        return 'accounthobbies';
    }

}

?>
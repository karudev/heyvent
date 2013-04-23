<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class EventsoociallinkType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

       
        $builder->add('url', 'text');
    }

    public function getName() {
        return 'eventsociallink';
    }

}

?>
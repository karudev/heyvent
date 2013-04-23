<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class EventType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

    
        $builder->add('name', 'text');
        $builder->add('presentation', 'text', array('required' => false));
        $builder->add('dateBegin', 'text');
        $builder->add('dateEnd', 'text', array('required' => false));
        $builder->add('description', 'textarea');
        $builder->add('isPrivate','choice', array('expanded'=>true,'choices'=>array(0 => 'Public', 1 => 'Privé')));
        $builder->add('idCategorie', 'entity', array(
            'class' => 'HeyAccountBundle:Categorie',
            'property' => 'libelle',
            'label' => 'libelle',
            'required' => true,
            'empty_value' => '',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('c')
                                ->orderBy('c.libelle', 'ASC');
            },
        ));
        $builder->add('typographyId', 'entity', array(
            'class' => 'HeyAccountBundle:Typography',
            'property' => 'name',
            'label' => 'name',
            'required' => true,
            'empty_value' => '',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('t')
                                ->orderBy('t.name', 'ASC');
            },
             'expanded' => true
        ));
        $builder->add('languageId', 'entity', array(
            'class' => 'HeyAccountBundle:Language',
            'property' => 'name',
            'label' => 'name',
            'required' => true,
            'empty_value' => '',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('l')
                                ->orderBy('l.name', 'ASC');
            },
             'expanded' => true
        ));
    }

    public function getName() {
        return 'event';
    }

}

?>
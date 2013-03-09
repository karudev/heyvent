<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AccountType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('civility', 'choice', array(
            'choices' => array(''=>'','Monsieur'=>'Monsieur', 'Madame'=>'Madame'),
            'required' => true
        ));
        $builder->add('statut', 'choice', array(
            'choices' => array(''=>'','Particulier'=>'Particulier', 'Entreprise'=>'Entreprise','Association'=>'Association','Autre'=>'Autre'),
            'required' => true
        ));
        $builder->add('firstname', 'text');
        $builder->add('lastname', 'text');
        $builder->add('tel', 'text',array('required'=>false));
        $builder->add('cp', 'text',array('required'=>false));
        $builder->add('city', 'text',array('required'=>false));
        $builder->add('district', 'text',array('required'=>false));
        $builder->add('country', 'text',array('required'=>false));
        $builder->add('email', 'email');
        $builder->add('username', 'hidden');
        $builder->add('dateOfBirth', 'date');
        $builder->add('allowMaillingInvitation', 'checkbox',array('required'=>false));
        $builder->add('allowAdsHeyvent', 'checkbox',array('required'=>false));
        
    }

    public function getName() {
        return 'account';
    }

}

?>
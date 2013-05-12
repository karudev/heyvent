<?php

namespace Hey\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class AccountType extends AbstractType {
   
    public $params = array('champPassword'=>'password');
    
    public function __construct($params = null) {
        
        if($params!=null)
        $this->params = $params;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('sex', 'choice', array(
            'choices' => array(''=>'','Homme'=>'Homme', 'Femme'=>'Femme'),
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
        $builder->add('username', 'text');
        $builder->add('password', $this->params['champPassword']);
        
        for($i=date('Y')-10;$i>=date('Y')-100;$i--):
        $dates[] = $i;
        endfor;
        
        $builder->add('dateOfBirth', 'birthday',array(
        'years'	=>	$dates,
        'format' => 'dd/MM/yyyy'));
      
        $builder->add('allowMaillingInvitation', 'checkbox',array('required'=>false));
        $builder->add('allowAdsHeyvent', 'checkbox',array('required'=>false));
        
    }

    public function getName() {
        return 'account';
    }

}

?>
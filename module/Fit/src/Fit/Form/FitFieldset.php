<?php

namespace Fit\Form;

use Zend\Form\Fieldset;
use Fit\Model\Fit;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of FitFieldset
 *
 * @author jeremy
 */
class FitFieldset extends Fieldset{
    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);
        $this->setHydrator(new ClassMethods(FALSE));
        $this->setObject(new Fit());
        
        $this->add(array(
            'type' => 'hidden',
            'name' => 'id',
        ));
        
        $this->add(array(
            'type' => 'text',
            'name' => 'steps',
            'options' => array(
                'label' => 'Steps'
            )
        ));
        
        $this->add(array(
            'type' => 'date',
            'name' => 'date',
            'options' => array(
                'label' => 'Date'
            )
        ));
        
    }
}

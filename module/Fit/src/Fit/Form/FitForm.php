<?php

namespace Fit\Form;

use Zend\Form\Form;

/**
 * Description of FitForm
 *
 * @author jeremy
 */
class FitForm extends Form {
    
    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);
        
        $this->add(array(
            'name' => 'fit-fieldset',
            'type' => 'Fit\Form\FitFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));
        
        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Insert new Fit'
            )
        ));
    }
    
}

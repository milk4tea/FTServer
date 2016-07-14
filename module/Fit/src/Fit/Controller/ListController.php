<?php

namespace Fit\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of ListController
 *
 * @author jeremy
 */
class ListController extends AbstractActionController {
    protected $fitService;
    
    public function __construct($fitService) {
        $this->fitService = $fitService;
    }
    
    public function indexAction() {
        return new ViewModel(array(
            'fits' => $this->fitService->findAll()
        ));
    }
            
}

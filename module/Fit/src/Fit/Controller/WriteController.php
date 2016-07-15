<?php

namespace Fit\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Fit\Service\FitServiceInterface;
use Fit\Form\FitForm;
use Zend\View\Model\ViewModel;

/**
 * Description of WriteController
 *
 * @author jeremy
 */
class WriteController extends AbstractActionController {
    protected $fitService;
    protected $fitForm;
    
    public function __construct(
        FitServiceInterface $fitService,
        FitForm $fitForm    
    ) {
        $this->fitService = $fitService;
        $this->fitForm = $fitForm;
    }
    
    public function addAction() {
        $request = $this->getRequest();
        if($request->isPost()) {
            $this->fitForm->setData($request->getPost());
            if($this->fitForm->isValid()) {
                try {
                    $this->fitService->save($this->fitForm->getData());
                    return $this->redirect()->toRoute('fit');
                } catch (\Exception $ex) {
                    die($ex->getMessage());
                }
            }
            
        }
        
        return new ViewModel(array(
            'form' => $this->fitForm
        ));
    }
    
    public function editAction() {
        
    }
    
}

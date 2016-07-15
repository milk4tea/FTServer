<?php

namespace Fit\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Fit\Controller\WriteController;
use Fit\Form\FitForm;

/**
 * Description of WriteControllerFactory
 *
 * @author jeremy
 */
class WriteControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $fitService = $realServiceLocator->get('Fit\Service\FitServiceInterface');
        return new WriteController($fitService, new FitForm());
    }

}

<?php

namespace Fit\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Fit\Controller\ListController;

/**
 * Description of ListControllerFactory
 *
 * @author jeremy
 */
class ListControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $fitService = $realServiceLocator->get('Fit\Service\FitServiceInterface');
        return new ListController($fitService);
    }

}

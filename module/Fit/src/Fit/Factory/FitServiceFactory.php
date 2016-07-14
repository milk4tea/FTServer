<?php

namespace Fit\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Fit\Service\FitService;

/**
 * Description of FitServiceFactory
 *
 * @author jeremy
 */
class FitServiceFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new FitService($serviceLocator->get('Fit\Mapper\FitMapperInterface'));
    }

}

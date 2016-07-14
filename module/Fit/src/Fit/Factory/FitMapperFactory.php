<?php

namespace Fit\Factory;

use Fit\Mapper\ZendDbSqlMapper;
use Fit\Model\Fit;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of ZendDbSqlMapperFactory
 *
 * @author jeremy
 */
class FitMapperFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new ZendDbSqlMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            'fits',
            new ClassMethods(FALSE),
            new Fit()
        );
    }

}

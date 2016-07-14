<?php
namespace Fit;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

/**
 * Description of Module
 *
 * @author jeremy
 */
class Module implements ConfigProviderInterface, AutoloaderProviderInterface {

    public function getAutoloaderConfig() {
         return array(
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 )
             )
         );              
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

}

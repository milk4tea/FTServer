<?php
    return array(
        'service_manager' => array(
            'factories' => array(
                'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
                'Fit\Mapper\FitMapperInterface' => 'Fit\Factory\FitMapperFactory',
                'Fit\Service\FitServiceInterface' => 'Fit\Factory\FitServiceFactory'
            )
        ),
        'controllers' => array(
            'factories' => array(
                'Fit\Controller\List' => 'Fit\Factory\ListControllerFactory',
            )
        ),
        'router' => array(
            'routes' => array(
                'fit' => array(
                    'type' => 'literal',
                    'options' => array(
                        'route' => '/fit',
                        'defaults' => array(
                            'controller' => 'Fit\Controller\List',
                            'action' => 'index'
                        )
                    ),
                    'may_terminate' => true,
                ),
            ),
        ),
        'view_manager' => array(
            'template_path_stack' => array(
                'blog' => __DIR__ . '/../view',
            ),
        ),        
    );

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
                'Fit\Controller\Write' => 'Fit\Factory\WriteControllerFactory',
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
                    'child_routes' => array(
                        'detail' => array(
                            'type' => 'segment',
                            'options' => array(
                                'route' => '/:id',
                                'defaults' => array(
                                    'action' => 'detail'
                                )
                            ),
                            'constraints' => array(
                                'id' => '[1-9]\d*'
                            )
                        ),
                        'add' => array(
                            'type' => 'literal',
                            'options' => array(
                                'route' => '/add',
                                'defaults' => array(
                                    'controller' => 'Fit\Controller\Write',
                                    'action' => 'add'
                                )
                            )
                        ),
                        'edit' => array(
                            'type' => 'segment',
                            'options' => array(
                                'route' => '/edit/:id',
                                'defaults' => array(
                                    'controller' => 'Fit\Controller\Write',
                                    'action' => 'edit'
                                ),
                                
                            )
                        )
                        
                    )
                ),
            ),
        ),
        'view_manager' => array(
            'template_path_stack' => array(
                'blog' => __DIR__ . '/../view',
            ),
        ),        
    );

<?php
namespace ModuleExample;
return array(
	'controllers'=> array(
		'invokables'=>array(
			'ModuleExample\Controller\ModuleExample'=> 'ModuleExample\Controller\ModuleExampleController',
                                    )
                    ),
                    
                    'router'=>array(
                        'routes'=>array(
                            'album'=>array(
                                'type'=>'segment',
                                'options'=>array(
                                      'route'=>'/example[/][:action][/:id]',
                                      'constraints'=>array(
                                           'action'=>'[a-zA-Z][a-zA-Z0-9_-]*',
                                          'id'=>'[0-9]+',
                                      ),
                                    'defaults'=> array(
                                        'controller'=>'ModuleExample\Controller\ModuleExample',
                                        'action'=>'index',
                                    ),
                                   ),
                            ),
                        ),
                    ),
                    
                     'asset_manager' => array(
        'resolver_configs' => array(
    
            'paths' => array(
                __DIR__ . '/../assets',
            ),
            
        ),
    ),
    
     'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            ),
        ),
    ),
      
	'view_manager'=>array(
		'template_path_stack'=>array(
			'albums'=>__DIR__.'/../view',
		),
	),
);

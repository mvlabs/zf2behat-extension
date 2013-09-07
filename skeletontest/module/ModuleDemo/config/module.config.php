<?php
namespace ModuleDemo;
return array(
	'controllers'=> array(
		'invokables'=>array(
			'ModuleDemo\Controller\ModuleDemo'=> 'ModuleDemo\Controller\ModuleDemoController',
                                    )
                    ),
                    
        'router'=>array(
            'routes'=>array(
                'demo'=>array(
                    'type'=>'segment',
                    'options'=>array(
                          'route'=>'/',
                          'defaults'=> array(
                            'controller'=>'ModuleDemo\Controller\ModuleDemo',
                            'action'=>'index',
                        ),
                       ),
                ),
            ),
        ),
             
	'view_manager'=>array(
		'template_path_stack'=>array(
			'albums'=>__DIR__.'/../view',
		),
	),
);

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
        
           
	
);

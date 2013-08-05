<?php

namespace ModuleExample;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                    
                ),
            ),
        );
    }

    

    public function getServiceConfig()
    {
        return array(
            'invokables'=>array(
                
              'example.service'=>'ModuleExample\Service\ModuleExampleService'
                
            ),
            
        );

    }
        
   
}

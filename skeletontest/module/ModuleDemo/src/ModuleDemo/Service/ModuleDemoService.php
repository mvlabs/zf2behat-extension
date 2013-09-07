<?php

namespace ModuleDemo\Service;

use ModuleDemo\Entity\ExampleEntityWidthDateTime;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class ModuleDemoService
{
   
    public function __construct() {
       
        
    }
    
    public function printHello(){
        
        return "Hello world";
        
    }
    
   
}

<?php

namespace ModuleDemo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        
        echo "Hello world";
        //return new ViewModel();
    }
}

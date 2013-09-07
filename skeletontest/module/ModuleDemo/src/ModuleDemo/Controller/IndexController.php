<?php

namespace ModuleDemo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return  "<html>".
                    "<body>".
                        "<h1>MMOPORTAL</h1>".
                        "<ul>".
                            "<li>Rift</li>".
                            "<li><a href='?type=ddo'>DDO</a></li>".
                        "</ul>".
                    "</body>".
                "</html>";
                 
        
    }
}

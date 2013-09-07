<?php
namespace MvLabs\Zf2Extension\Context;
use Zend\Mvc\Application;

/**
 * Description of Zf2AwareContextInterface
 *
 * @author mauilap
 */
interface Zf2AwareContextInterface
{
    public function setZf2App(Application $zf2Application);
    
   
}

<?php
namespace Behat\Zf2Extension\Context;

use Behat\Behat\Context\BehatContext;
use Behat\MinkExtension\Context\MinkContext;
use Zend\ServiceManager\Exception\InvalidServiceNameException;
use Behat\Zf2Extension\Context\Zf2AwareContextInterface;


/**
 * Provide basic functionality of the Zf2 Application such as ServiceManager
 *
 * @author David Contavalli < mauipipe@gmail.com >
 * @copyright M.V. Labs - All Rights Reserved -
 *  You may execute and modify the contents of this file, but only within the scope of this project.
 *  Any other use shall be considered forbidden, unless otherwise specified.
 * @link http://www.mvassociates.it
 */
class Zf2ApplicationContext extends MinkContext implements Zf2AwareContextInterface{
   
   private $zf2Application;
   
   public function getZf2App() {
       
       return $this->zf2Application;
       
   }
 
   public function setZf2App(\Zend\Mvc\Application $zf2Application) {
       
       $this->zf2Application = $zf2Application;
       
   }
   
   public function getServiceByAlias($serviceName) {
       
       $serviceManager = $this->getServiceManager();
             
       if(!$serviceManager->has($serviceName)) {
          
           throw new InvalidServiceNameException();
           
       } 
       return $this->zf2Application->getServiceManager->get($serviceName);
       
   }
      
   /**
    * Get ServiceManager
    * @return Zend\ServiceManager\ServiceManager
    */
   private function getServiceManager(){
       
       return $this->zf2Application->getServiceManager();
       
   }

    
   
}

?>

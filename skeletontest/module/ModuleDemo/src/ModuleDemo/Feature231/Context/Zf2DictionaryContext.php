<?php
namespace ModuleDemo\Features\Context;

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
/**
 * Description of Zf2DictionaryContext
 *
 * @author David Contavalli < mauipipe@gmail.com >
 * @copyright M.V. Labs 2011 - All Rights Reserved -
 *  You may execute and modify the contents of this file, but only within the scope of this project.
 *  Any other use shall be considered forbidden, unless otherwise specified.
 * @link http://www.mvassociates.it
 */
class Zf2DictionaryContext extends BehatContext{
    
    use \Behat\Zf2Extension\Context\Zf2Dictionary;
    
    private $serviceName;
      
    
      /**
     * @Given /^a Zf(\d+)Dictionary trait$/
     */
    public function aZfdictionaryTrait()
    {
       assertTrue(trait_exists("Behat\Zf2Extension\Context\Zf2Dictionary"));
        
    }

    /**
     * @When /^I call getServiceManager method$/
     */
    public function iCallGetservicemanagerMethod()
    {
        
        assertInstanceOf("Zend\ServiceManager\ServiceManager",$this->getServiceManager());
        
    }
    
     /**
     * @Then /^It should be an "([^"]*)"$/
     */
    public function itShouldBeAn($serviceName)
    {
        
        $this->serviceName = $serviceName;
        assertTrue($this->getServiceManager()->has($serviceName));
                  
    }

  
   
    /**
     * @Given /^It should be an instance of ExampleService$/
     */
    public function itShouldBeAnInstanceOfExampleservice()
    {
       
        assertInstanceOf("ModuleDemo\Service\ModuleDemoService",$this->getServiceByAlias($this->serviceName));
        
    }


       
    public function setZf2App(\Zend\Mvc\Application $zf2Application) {
        
        $this->zf2Application = $zf2Application;
        
    }
   
    
}

?>

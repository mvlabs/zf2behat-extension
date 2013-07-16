<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\Zf2Extension\Context\Zf2AwareContextInterface;
//
// Require 3rd-party libraries here:
//
   require_once 'PHPUnit/Autoload.php';
   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

use Zend\Mvc\Application,
    Zend\ServiceManager\ServiceManager;

/**
 * Features context.
 */
class FeatureContext extends BehatContext implements Zf2AwareContextInterface
{

    private $zf2Application;
    private $serviceManager;
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {

    }

    /**
     * @Given /^Zend\\Mvc\\Application is initialized$/
     */
    public function zendMvcApplicationIsInitialized()
    {
        if( !($this->zf2Application instanceof Application) ) {
            
            throw new \Exception("property zf2Application is not an instance of Zend\Mvc\Application");
        }
       
    }

    /**
     * @When /^method getServiceManager is invoked$/
     */
    public function methodGetservicemanagerIsInvoked()
    {

        if( !method_exists( $this->zf2Application, "getServiceManager" ) ) {
            
            throw new \Exception("method getServiceManager does not exist in zf2Application propert");
            
        }
        $this->serviceManager = $this->zf2Application->getServiceManager();

    }

    /**
     * @Then /^I have an instance of ServiceManager$/
     */
    public function iHaveAnInstanceOfServicemanager()
    {

       if( !($this->serviceManager instanceof ServiceManager) ) {
           
           throw new \Exception("property serviceManager is not an instance of Zend\ServiceManager\ServiceManager");
           
       }

    }

    public function setZf2App( \Zend\Mvc\Application $zf2Application )
    {
        
        $this->zf2Application = $zf2Application;

    }
}

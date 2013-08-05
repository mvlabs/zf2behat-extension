<?php
namespace Behat\ModuleDemo\Features\Context;


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
class FeatureContext extends BehatContext implements Zf2AwareContextInterface {

    use Behat\Zf2Extension\Context\Zf2Dictionary;
    
    private $zf2Application;
    private $serviceManager;
    private $parameters;
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters){

        $this->parameters = $parameters;
        $this->useContext('traits', new Zf2DictionaryContext());
    }

    /**
     * @Given /^Zend\\Mvc\\Application is initialized$/
     */
    public function zendMvcApplicationIsInitialized()
    {
       
        assertInstanceOf("Zend\Mvc\Application",$this->zf2Application);
        
    }

    /**
     * @When /^method getServiceManager is invoked$/
     */
    public function methodGetservicemanagerIsInvoked()
    {
               
        assertTrue(method_exists( $this->zf2Application, "getServiceManager" )); 
        $this->serviceManager = $this->zf2Application->getServiceManager();

    }

    /**
     * @Then /^I should have a ServiceManager instance$/
     */
    public function iShouldHaveAServicemanagerInstance()
    {
        
        assertInstanceOf("Zend\ServiceManager\ServiceManager",$this->serviceManager);
        
    }
    
            
    public function setZf2App(Application $zf2Application) {
        
        $this->zf2Application = $zf2Application;
        
    }
   
}

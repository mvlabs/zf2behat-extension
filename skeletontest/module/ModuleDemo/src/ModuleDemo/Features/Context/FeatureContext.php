<?php
namespace ModuleDemo\Features\Context;


use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use MvLabs\Zf2Extension\Context\Zf2AwareContextInterface;

use Zend\Mvc\Application;       
//
// Require 3rd-party libraries here:
//
   require_once 'PHPUnit/Autoload.php';
   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
* Feature context.
*/
class FeatureContext extends BehatContext implements Zf2AwareContextInterface
{
    private $zf2MvcApplication;
    private $parameters;
    private $moduleService;
    
    /**
    * Initializes context with parameters from behat.yml.
    *
    * @param array $parameters
    */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
    * Sets HttpKernel instance.
    * This method will be automatically called by Zf2Extension ContextInitializer.
    *
    * @param Zend\Mvc\Application $zf2MvcApplication
    */
    public function setZf2App(Application $zf2MvcApplication)
    {
       $this->zf2MvcApplication = $zf2MvcApplication;
    }

    /**
     * @Given /^I have a Zend\\MVC\\Application instance$/
     */
    public function iHaveAZendMvcApplicationInstance()
    {
        
        assertInstanceof("Zend\MVC\Application",$this->zf2MvcApplication);
        
    }

    /**
     * @When /^I get the ServiceManager from it$/
     */
    public function iGetTheServicemanagerFromIt()
    {
        assertTrue(is_callable(array($this->zf2MvcApplication,"getServiceManager")));
    }

    /**
     * @Then /^it could be possible call a service using  "([^"]*)" as param$/
     */
    public function itCouldBePossibleCallAServiceUsingAsParam($serviceName)
    {
       
        $this->moduleDemoService = $this->zf2MvcApplication->getServiceManager()->get($serviceName);
        assertInstanceof("ModuleDemo\Service\ModuleDemoService",$this->moduleDemoService);
       
    }

    /**
     * @Given /^use it to retrieve an "([^"]*)" message$/
     */
    public function useItToRetrieveAnMessage($message)
    {
        
        assertEquals($message,$this->moduleDemoService->printHello());
        
    }
}

<?php
namespace ModuleDemo\Features\Context;


use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Behat\Exception\PendingException;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use MvLabs\Zf2Extension\Context\Zf2AwareContextInterface;

use Zend\Mvc\Application;       
//
// Require 3rd-party libraries here:
//
// require_once 'PHPUnit/Autoload.php';
// require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
* Feature context.
*/
class FeatureContext extends MinkContext implements Zf2AwareContextInterface
{
    private $zf2MvcApplication;
    private $parameters;

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

}
?>

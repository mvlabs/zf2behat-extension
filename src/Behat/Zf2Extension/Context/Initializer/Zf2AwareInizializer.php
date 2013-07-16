<?php
namespace Behat\Zf2Extension\Context\Initializer;

use Behat\Behat\Context\Initializer\InitializerInterface,
    Behat\Behat\Context\ContextInterface;

use Behat\Zf2Extension\Context\Zf2AwareContextInterface;
/**
 * Description of Zf2Initializer
 *
 * @author mauilap
 */

class Zf2AwareInizializer implements InitializerInterface
{
    private $zf2App;

    public function __construct( $configFile )
    {
       $this->zf2App = \Zend\Mvc\Application::init(require $configFile);

    }

     public function supports(ContextInterface $context)
     {
       return $context instanceof Zf2AwareContextInterface;

    }

    public function initialize(ContextInterface $context)
    {
        $context->setZf2App($this->zf2App);

    }

}

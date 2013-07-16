mvlavs/zf2behat-extension
==============

Behat extension for Zend Framework 2 load Zend\Mvc\Application implementing Zf2AwareContextInterface in your context

Requirements
=============
```
 "require": {
	"php":">=5.3.3",
	"behat/behat":"=2.4@stable",
    }
```
Installation
==============
Add in your composer.json
```
"require": {
     "mvlabs/zf2behat-extension" : "1.0.0",
}

```

Usage example
=============

Add the extension in behat.yml file and set under zf2_config_path the location of the file application.config.php

```
    Behat\Zf2Extension\Zf2Extension:
      zf2_config_path: "config/application.config.php"

```

Implements in every context file Behat\Zf2Extension\Context\Zf2AwareContextInterface and pass the value of $zf2Application too a property

```
<?php

namespace testapp\src\features\bootstrap;

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
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//


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
   

    public function setZf2App( \Zend\Mvc\Application $zf2Application )
    {
        $this->zf2Application = $zf2Application;

    }
}

```



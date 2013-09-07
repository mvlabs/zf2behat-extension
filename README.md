mvlabs/zf2behat-extension
==============
[![Build Status](https://travis-ci.org/mvlabs/zf2behat-extension.png)

Behat extension for Zend Framework 2 inspired by Symfony2extension by Konstantin Kudryashov

Requirements
=============
The Extension requires:
```
 "php":">=5.3.3",
  "behat/behat":"=2.4@stable",
  "zendframework/zendframework":"2.2.*"
```
Installation
=============
This extension need composer to be installed. Add in your composer.json
```
"require": {
     "mvlabs/zf2behat-extension" : "dev-master",
}

```

How to Use
==========

The extension could be used in 2 different ways:

1. If you are using a php version 5.4+, you can use MvLabs\Zf2BehatExtension\Context\Zf2Dictionary trait 
   which provides basic ZendFramework 2 functionality. This functionality could be used only in one Context though.
  
2. You could implement the MvLabs\Zf2BehatExtension\Context\Zf2AwareContextInterface on every context avoiding to call parent context 
   from subcontexts.
  
Both methods call a method setZf2App(Application $zf2Application) needed to set in a private property Zend\Mvc\Application to be reused 
on every step needed 


Initialization inside a Module
==============================

In order to initialize your feature suite inside a Zend Framework 2 module, you need to execute:
```
$ php bin\behat --init "<module name>"

```
After the command is executed it will create a Features folder inside your module with a extension ready FeatureContext inside the Context subfolder


Run your features
=================

You could run your module suite executing:
```
$ php bin\behat "<module name>"

```
If you run specific module suite often it's possible set a "bundle" parameter inside a profile in your 
behat.yml file like in the example below:
```
default:
  extensions:
      MvLabs\Zf2Extension\Zf2Extension:
        module: User
example:
   extensions:
      MvLabs\Zf2Extension\Zf2Extension:
        module: Album
    
```
After setting those profile you could run your bundle simplie executing:
 ```
$ php bin\behat -p=example

```
You could in addition run a specific feature executing:
```
$ php bin\behat "<module folder/feature folder/feature file>"

```

Appication Level Feature Suite
==============================

If you don't want to use module-centric structure it's possible maitain an application structure
specifing a features path and context class in your behat.yml file like in the example:

```
default:
  paths:
    features: features
  context:
      class: ModuleDemo\Features\Context\CustomContext
```

Using this path you shuold only remember to add your context class in the autoloader.

Configuration
=============

 1. module - set the bundle to be runned for a specific profile
 2. config - set a custom configuration file. if it is not specified config/application.config.php will be loaded







<img src="https://travis-ci.org/mvlabs/zf2behat-extension.png" />

mvlabs/zf2behat-extension
==============
Behat extension for Zend Framework 2 inspired by Symfony2extension by Konstantin Kudryashov.

Behat (http://behat.org/) is a php framework for Behavior Driven Development. 
This extension allows you to use it in your Zend Framework 2 projects.
It initializes Behat, allowing you to quickly use your Gherking features within ZF2.


1.Requirements
=============
The Extension requires:
```
 "php":">=5.3.3",
  "behat/behat":"=2.4@stable",
  "zendframework/zendframework":">=2.2.0"
```



2.Installation
=============
This extension need composer to be installed. You only need to add the following in your composer.json:

```
"require": {
     "mvlabs/zf2behat-extension" : "dev-master"
}

```

At this point, you need to create a file named behat.yml in your application root folder with following content:

```
default:
 extensions:
    MvLabs\Zf2Extension\Zf2Extension:
```



3.Usage
=======

If you don't have an existing test suite, please proceed to 4.Initialization within a Module.
Otherwise, you can use this extension within your existing test suite in 2 different ways:

1.  If you are using php version 5.4+, you can use MvLabs\Zf2BehatExtension\Context\Zf2Dictionary trait 
    which provides basic ZendFramework 2 functionality. This functionality can only be used in one Context though.
2.  You can implement the MvLabs\Zf2BehatExtension\Context\Zf2AwareContextInterface for every context, avoiding to call parent context 
    from subcontexts.
  
Both methods call a method setZf2App(Application $zf2Application) needed to set in a private property Zend\Mvc\Application to be reused 
on every step needed 



4.Initialization inside a Module
==============================

In order to initialize your feature suite inside a Zend Framework 2 module, you need to execute:

```
$ php bin\behat --init "<module name>"

```

So, for example, if you want to initialize the skeleton application, you could just do from your application root directory:

```
vendor/bin/behat --init Application
```

After the command is executed it will create a Features folder inside your module 
with a extension ready FeatureContext inside the Context subfolder.
You should see following output in console:


```
+d module/<module name>/src/<module name>/Features - place your *.feature files here
+f module/<module name>/src/<module name>/Features/Context/FeatureContext.php - place your feature related code here
```



5.Running your features
=======================

Now that you have your Features directory within your module source folder (module/<module name>/src/) you can create your first feature file in Gherkin.
Please refer to the official behat documentation (http://docs.behat.org/quick_intro.html#define-your-feature) to see how to create your first feature file.

At this point, you only need to run:

```
vendor/bin/behat <module_name> 
```

to run the feature against your module. 



6.Feature profiles
==================
If you often find yourself running a specific module suite it's possible to set a module parameter inside a profile in your 
behat.yml file like in the example below:

```
default:
  extensions:
      MvLabs\Zf2Extension\Zf2Extension:
        module: <module_name>
    
```

You can then just call behat without arguments:

```
vendor/bin/behat

```

Within a profile you can use a specific Zend Framework config/application.config.php file, through the following:

```
default:
  extensions:
      MvLabs\Zf2Extension\Zf2Extension:
        module: <module_name>
	config: <my_custom_config_file_path>
    
```



7.Multiple feature profiles
===========================
You can also use multiple profiles, such in the example below:

```
default:
  extensions:
      MvLabs\Zf2Extension\Zf2Extension:
        module: User

example:
   extensions:
      MvLabs\Zf2Extension\Zf2Extension:
        module: Albums
```


After setting those profiles, you can your Albums module suite executing:

 ```
$ php bin\behat -p=example

```



8.Specific Feature Execution
============================

You can run specific features specifying file name:

```
$ php bin\behat "<module folder/feature folder/feature file>"

```



9.Appication Level Feature Suite
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



10.Configuration Parameters
===========================

Supported options for profiles are:

1.  module - set the module to be runned for a specific profile (only one module per profile is currently supported)
2.  config - set a custom configuration file. if it is not specified config/application.config.php will be loaded


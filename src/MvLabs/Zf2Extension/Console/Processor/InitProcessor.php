<?php
namespace  MvLabs\Zf2Extension\Console\Processor;

use Symfony\Component\DependencyInjection\ContainerInterface,
    Symfony\Component\Console\Command\Command,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

use Behat\Behat\Console\Processor\InitProcessor as BaseProcessor;
/**
 * Description of initProcessor
 *
 * @author David Contavalli < mauipipe@gmail.com >
 */

class InitProcessor extends BaseProcessor{
    
    const CONTEXT = "Context";
    const CONTEXT_FILE = "FeatureContext.php";
    const FEATURES = "Features";
        
    private $container;
    
    /**
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct( ContainerInterface $container ) {
        
        $this->container = $container;
        
    }
    
   public function process(InputInterface $input, OutputInterface $output) {
      
     if(!$input->getArgument('features') && $input->getOption('init')){
          
          throw new \InvalidArgumentException("Provide a valid zf2 Module name in order to init suite");
          
      }
      
      // initialize bundle structure and exit
      if ($input->getOption('init')) {

         $this->initBehatFolderStructure($input, $output);
         exit(0);
         
      }
            
   }
   
   protected function initBehatFolderStructure(InputInterface $input, OutputInterface $output) {
       
      
       $moduleName = $input->getArgument('features');
       $moduleDetailRetriever =  $this->container->get("zf2_extesion.moduledetailretriever");
       
       $modulePath = $moduleDetailRetriever->getModulePath($moduleName);
       
       
       if(!$modulePath || !file_exists($modulePath)){
           
           throw new \UnexpectedValueException(sprintf("Invalid module %s provided",$moduleName));
           
       }
      
       
       $featuresPath = $modulePath.DIRECTORY_SEPARATOR.self::FEATURES;
       $contextPath = $featuresPath.DIRECTORY_SEPARATOR.self::CONTEXT ;
       $basePath = $this->container->getParameter("behat.paths.base").DIRECTORY_SEPARATOR ;
            
       
       if(!is_dir($featuresPath)) {
         
           mkdir($featuresPath,0777,true);       
           
           $output->writeln('<info>+d</info> ' .
                str_replace($basePath, '', realpath($featuresPath)) .
              ' <comment>- place your *.feature files here</comment>');
           
       }
       
      
       if(!is_dir($contextPath)) {
           
           mkdir($contextPath,0777,true);
           
           file_put_contents($contextPath.DIRECTORY_SEPARATOR.self::CONTEXT_FILE, 
                   strtr($this->getFeatureContextSkelet(),array(
                       "%NAMESPACE%"=>$moduleName
                   ))
           );
           
           $output->writeln(
               '<info>+f</info> ' .
               str_replace($basePath, '', realpath($contextPath)) . DIRECTORY_SEPARATOR .
               'FeatureContext.php <comment>- place your feature related code here</comment>'
           );
           
       }
        
       
   }
   
   protected function getFeatureContextSkelet() {
       
return <<<'PHP'
<?php
namespace %NAMESPACE%\Features\Context;


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
// require_once 'PHPUnit/Autoload.php';
// require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
* Feature context.
*/
class FeatureContext extends BehatContext //MinkContext if you want to test web page
implements Zf2AwareContextInterface
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

    //
    // Place your definition and hook methods here:
    //
    // /**
    // * @Given /^I have done something with "([^"]*)"$/
    // */
    // public function iHaveDoneSomethingWith($argument)
    // {
    //  $serviceManager = $this->zf2MvcApplication->getServiceManager();
    //  $serviceManager->get('service.example')->doSomethingWith($argument);
    // }
//
}
      
PHP;
   }
    
}

?>

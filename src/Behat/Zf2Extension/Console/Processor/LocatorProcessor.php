<?php
namespace Behat\Zf2Extension\Console\Processor;

use Symfony\Component\DependencyInjection\ContainerInterface,
    Symfony\Component\Console\Command\Command,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

use Behat\Behat\Console\Processor\Processor as BaseProcessor;

/**
 * Description of LocatorProcessor
 *
 * @author David Contavalli < mauipipe@gmail.com >
 */

class LocatorProcessor extends BaseProcessor{
    
    private $container;
    
    /**
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
      
        $this->container = $container;
        
    }
    
    public function configure(Command $command) {
        
        $command->addArgument('features', InputArgument::OPTIONAL,
                 "Feature(s) to run. Could be:".
                 "\n- a dir (<comment>src/to/Module/Features/</comment>), " .
                 "\n- a feature (<comment>src/to/Module/Features/*.feature</comment>), " 
                );
                       
    }
    
    
   public function process(InputInterface $input, OutputInterface $output){
        
        
        $featuresPath = $input->getArgument('features');
        
        $pathSuffix = $this->container->getParameter('behat.zf2_extension.context.path_suffix');
        
        $moduleName = $this->container->getParameter('behat.zf2_extension.module');
            
        $modulePath = $this->getModulePath($moduleName);
            
       
        //@TODO Module from feature path
        //$path = realpath(preg_replace('/\.feature\:.*$/', '.feature', $featuresPath));
        
       if($modulePath) {
        
           $featuresPath = $modulePath.DIRECTORY_SEPARATOR.$pathSuffix.DIRECTORY_SEPARATOR.$featuresPath;
           
       }
       
       $featuresPath = $this->container->get("behat.paths.features");
       
       
       $this->container
             ->get('zf2.context.class_guesser')
             ->setModuleNamespace($moduleName);
              
       $this->container
            ->get('behat.console.command')
            ->setFeaturesPaths($featuresPath ? array($featuresPath) : array());
       
    }
    
    private function getModulePath($moduleName){
       
        $mvcApplication = $this->container->get('behat_zf2_extension.application');
        $loadedModules = $mvcApplication->getServiceManager()->get('ModuleManager')->getLoadedModules();
        $module = $loadedModules[$moduleName];
        $moduleConfig = $module->getAutoloaderConfig();
        return $moduleConfig['Zend\Loader\StandardAutoloader']['namespaces']['ModuleDemo'];
        
    }
    
}

?>

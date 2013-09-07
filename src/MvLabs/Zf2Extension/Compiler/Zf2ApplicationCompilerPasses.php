<?php
namespace MvLabs\Zf2Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface,
    Symfony\Component\DependencyInjection\ContainerBuilder;

class Zf2ApplicationCompilerPasses  implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
      //Loading Configuration
      $applicationPath = $container->getParameter('behat.paths.base');
      $configPath = $container->getParameter("behat.zf2_extension.config_path");
      $fullConfigPath = $applicationPath.DIRECTORY_SEPARATOR.$configPath;

      if (!file_exists($fullConfigPath)) {

           throw new \RuntimeException("invalid config path ".$fullConfigPath);

      }

      $configuration = require $fullConfigPath;
      $container->setParameter('behat.zf2_extension.config_data',$configuration);

      //Get A list of all loaded module
      $moduleDetailRetrtiever = $container->get("zf2_extesion.moduledetailretriever");

     if ($moduleName = $container->getParameter('behat.zf2_extension.module')) {

         $container->set("behat.paths.features",
                      $moduleDetailRetrtiever->getModulePath($moduleName).DIRECTORY_SEPARATOR.$container->getParameter("behat.zf2_extension.context.path_suffix")
          );

      }

    }

}

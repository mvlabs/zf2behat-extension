<?php
namespace MvLabs\Zf2Extension\Context\ClassGuesser;

use Behat\Behat\Context\ClassGuesser\ClassGuesserInterface;

/**
 * Description of zf2ClassGuesser
 *
 * @author David Contavalli < mauipipe@gmail.com >
 * @copyright M.V. Labs (c) 2011 - All Rights Reserved -
 *  You may execute and modify the contents of this file, but only within the scope of this project.
 *  Any other use shall be considered forbidden, unless otherwise specified.
 * @link http://www.mvassociates.it
 */
class Zf2ClassGuesser implements ClassGuesserInterface
{
    private $classSuffix;
    private $namespace;

    public function __construct($classSuffix = 'Features\\Context\\FeatureContext')
    {
        $this->classSuffix = $classSuffix;

    }

    public function setModuleNamespace($namespace)
    {
        $this->namespace = $namespace;

    }

    public function guess()
    {
        if (class_exists($fullContextNamespace = $this->namespace."\\".$this->classSuffix)) {
            return $fullContextNamespace ;

        }

        return $this->classSuffix;
    }

}

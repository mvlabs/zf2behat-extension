<?php
namespace MvLabs\Zf2Extension\Context;

/**
 * Provide common services Zf2 functionalities
 *
 * @author David Contavalli < mauipipe@gmail.com >
 * @copyright M.V. Labs (c) 2011 - All Rights Reserved -
 *  You may execute and modify the contents of this file, but only within the scope of this project.
 *  Any other use shall be considered forbidden, unless otherwise specified.
 * @link http://www.mvassociates.it
 */
trait Zf2Dictionary
{
    private $zf2Application;

    /**
     * Set Zf2 Zend\Mvc\Application instance
     */
    public function setZf2App( \Zend\Mvc\Application $zf2Application )
    {
        $this->zf2Application = $zf2Application;
    }

    public function getServiceManager()
    {
        return $this->zf2Application->getServiceManager();
    }

    public function getServiceByAlias( $serviceAlias )
    {
        $serviceManager = $this->getServiceManager();

        return $serviceManager->get( $serviceAlias);
    }
}

<?php
namespace ModuleExample\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ExampleEntity
 * @ORM\Table(name="commonEntity")
 * @ORM\Entity(repositoryClass="ModuleExample\Entity\Repository\ExampleEntityRepository")
 */
class ExampleEntity

{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $name;
     
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $address;
    
    /**
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
     

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set name
     *
     * @param  string   $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * 
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * 
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

}
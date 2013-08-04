<?php
namespace ModuleExample\Entity;


use Doctrine\ORM\Mapping as ORM;
/**
 * 
 *
 * @ORM\Table(name="ExampleEntityWithDate")
 * @ORM\Entity(repositoryClass="ModuleExample\Entity\Repository\ExampleEntitWithDateTimeyRepository");
 */
class ExampleEntityWidthDateTime {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="customer_id_seq", allocationSize=1, initialValue=1)
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
     * @var DateTime
     * @ORM\Column(type="datetime",length=30,nullable=false)
     */
    private $birthdate;
    
       
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set name
     *
     * @param  string   $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
    
    
    //Address
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
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    //BirthDate
    /**
     * 
     * @return DateTime
     */
    public function getBirthDate() {
        
        return $this->birthdate;
        
    }
    /**
     * @param \DateTime $birthDate
     * @return void
     */
    public function setBirthDate(\DateTime $birthDate) {
        
        $this->birthdate = $birthDate;
        
    }
    
    
    
    
}
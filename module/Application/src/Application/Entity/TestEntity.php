<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM, 
Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="bugs") 
 * @ORM\Entity(repositoryClass="Application\Repository\TestEntityRepository")
 */
class TestEntity
{
	const STATUS_DISABLED = 0;
	const STATUS_ENABLED = 1;
	
	
	/** 
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 **/
	private $id; 
	
	/**
	 * @ORM\OneToMany(targetEntity="ManyToOneEntity", mappedBy="testEntity")
	 **/
	private $manyToOneEntities;  
	
	/**
	 * @ORM\ManyToOne(targetEntity="Company", inversedBy="testEntities")
	 **/
	private $company;
	
	/**
	 * @ORM\Column(type="smallint")
	 **/
	private $status = self::STATUS_ENABLED;
	
	/**
	 * @ORM\Column(type="smallint")
	 **/
	private $state = self::STATUS_DISABLED;
	
	/** 
	 * @ORM\Column(type="string", unique=true) 
	 **/
	private $headline;
	
	public function close()
	{
		$this->status = self::STATUS_DISABLED;
	}
	
	
	public function __construct() {
		$this->manyToOneEntities = new ArrayCollection();
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setHeadline($headline) 
	{
		$this->headline = $headline;
	}
	
	public function getHeadline() 
	{
		return $this->headline;
	}
	
}
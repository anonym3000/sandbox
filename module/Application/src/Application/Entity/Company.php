<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Company
{
	/** 
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 **/
	private $id; 
	
	/** @ORM\Column(type = "string") */
	private $name;
	
	/**
	 * @ORM\OneToMany(targetEntity="TestEntity", mappedBy="company")
	 **/
	private $testEntites;
	
	public function getId()
	{
		return $this->id;
	}  
}
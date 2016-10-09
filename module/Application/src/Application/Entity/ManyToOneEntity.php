<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\ManyToOneRepository")
 * @ORM\Table(name="temporary", options={"collate":"utf8_general_ci", "charset":"utf8"}) 
 */
class ManyToOneEntity
{
	/** 
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 **/
	private $id;
	
	/** 
	 * @ORM\ManyToOne(targetEntity="TestEntity", inversedBy="manyToOneEntities")
	 **/
	private $testEntity;
	
	/** 
	 * @ORM\Column(type="string") 
	 **/
	private $mtoStr;
	
	/** @ORM\Embedded(class = "Address", columnPrefix = "addr_") */
	private $address;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setMto($mto) 
	{
		$this->mto = $headline;
	}
	
	public function getMto() 
	{
		return $this->mto;
	}
	
	public function setMtoStr($mtoStr)
	{
		$this->mtoStr = $mtoStr;
	}
	
	public function getMtoStr()
	{
		return $this->mtoStr;
	}
	
}
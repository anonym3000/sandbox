<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\OneToOneRepository")
 */
class OneToOneEntity
{
	/** 
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 **/
	private $id;
	
	/** @ORM\OneToOne(targetEntity="Resource") */
	private $resource;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setResource($resource) 
	{
		$this->resource = $resource;
	}
	
	public function getResource() 
	{
		return $this->resource;
	}
	
}
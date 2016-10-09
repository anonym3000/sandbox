<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\ResourceRepository")
 */
class Resource
{
	/** 
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 **/
	private $id; 
	
	public function getId()
	{
		return $this->id;
	}  
}
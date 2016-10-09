<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM, 
Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Embeddable 
 */
class Address
{
	
	/** @ORM\Column(type = "string") */
    private $street;

    /** @ORM\Column(type = "string") */
    private $postalCode;

    /** @ORM\Column(type = "string") */
    private $city;

    /** @ORM\Column(type = "string") */
    private $country; 
	
}
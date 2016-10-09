<?php
namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

 
class TestEntityRepository extends EntityRepository
{
	public function getRows()
	{
		$dql = "SELECT te FROM Application\Entity\TestEntity te";
		
		$query = $this->getEntityManager()->createQuery($dql);
		$query->setMaxResults(30);
		return  $query->getArrayResult();		
	}
}
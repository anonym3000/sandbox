<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $_em;
	
	/**
	 * 
	 * @return \Doctrine\ORM\EntityManager
	 */
    public function getEntityManager()
	{
		if (null === $this->_em) {
			$this->_em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}
		return $this->_em;
	}
	
	
    public function indexAction()
    {
    	try { 
	    	//$testEntity = new \Application\Entity\TestEntity();
	    	
    		$testEntity = $this->getEntityManager()->getRepository('\Application\Entity\TestEntity')->findOneById(2);
    		
	    	$testEntity->setHeadline('headedddddâîăț');
	    	$testEntity->close();
	    	
	    	
	    	//$this->getEntityManager()->persist($testEntity);
	    	$this->getEntityManager()->flush();
	    	 
    	} catch (\Exception $ex) {
    		var_dump($ex->getMessage());die;
    	}
    	
        return new ViewModel();
    }
    
    public function testAction()
    {
    	$rows = $this->getEntityManager()->getRepository('\Application\Entity\TestEntity')->getRows();
    	
    	var_dump($rows);die;
    	
    	return $this->getResponse();
    }
}

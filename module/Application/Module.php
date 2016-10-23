<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
 
/* use Zend\Session\SaveHandler\MongoDB;
use Zend\Session\SaveHandler\MongoDBOptions;
use Zend\Session\SessionManager; */

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $this->initMongoSession($e);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    } 
    
    public function initMongoSession(MvcEvent $event)
    {
    	$client = new \MongoDB\Client("mongodb://localhost:27017");
		$collection = $client->demo->beers;
		
		$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
		
		echo "Inserted with Object ID '{$result->getInsertedId()}'";die;
		
		/*
		 * $result = $collection->find( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

			foreach ($result as $entry) {
			    echo $entry['_id'], ': ', $entry['name'], "\n";
			}
		 * */ 
    }
    
}

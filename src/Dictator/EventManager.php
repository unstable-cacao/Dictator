<?php
namespace Dictator;


use Dictator\Base\DAO\IBaseEventDAO;
use Dictator\Base\DAO\IEntityEventDAO;
use Dictator\Base\DAO\IParameterizedEventDAO;
use Dictator\Base\IConfig;
use Dictator\Base\IEventManager;
use Dictator\Object\BaseEvent;
use Dictator\Object\EntityEvent;
use Dictator\Object\ParameterizedEvent;


/**
 * @autoload
 */
class EventManager implements IEventManager
{
	/**
	 * @var \Dictator\Base\IConfig
	 * @autoload
	 */
	private $config;
	
	
	/**
	 * @return IConfig
	 */
	public function config()
	{
		return $this->config;
	}
	
	/**
	 * @param string $userID
	 * @param string $eventName
	 * @return bool
	 */
	public function baseEvent($userID, $eventName)
	{
		$event = new BaseEvent();
		$event->EventName = $eventName;
		$event->UserID = $userID;
		
		/** @var IBaseEventDAO $dao */
		$dao = \Dictator::skeleton(IBaseEventDAO::class);
		$dao->setConnection($this->config()->getConnection());
		
		return $dao->insertBaseEvent($event);
	}
	
	/**
	 * @param string $userID
	 * @param string $eventName
	 * @param array $parameters
	 * @return bool
	 */
	public function parameterizedEvent($userID, $eventName, array $parameters)
	{
		$event = new ParameterizedEvent();
		$event->EventName = $eventName;
		$event->UserID = $userID;
		$event->ParamsCount = count($parameters);
		
		/** @var IParameterizedEventDAO $dao */
		$dao = \Dictator::skeleton(IParameterizedEventDAO::class);
		$dao->setConnection($this->config()->getConnection());
		
		return $dao->insertParameterizedEvent($event, $parameters);
	}
	
	/**
	 * @param string $userID
	 * @param string $entityName
	 * @param string $actionType
	 * @param array $parameters
	 * @return bool
	 */
	public function entityEvent($userID, $entityName, $actionType, array $parameters)
	{
		$event = new EntityEvent();
		$event->UserID = $userID;
		$event->EntityName = $entityName;
		$event->ActionType = $actionType;
		
		/** @var IEntityEventDAO $dao */
		$dao = \Dictator::skeleton(IEntityEventDAO::class);
		$dao->setConnection($this->config()->getConnection());
		
		return $dao->insertEntityEvent($event, $parameters);
	}
}
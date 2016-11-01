<?php
namespace Dictator;


use Dictator\Base\DAO\IBaseEventDAO;
use Dictator\Base\IConfig;
use Dictator\Base\IEventManager;
use Dictator\Object\BaseEvent;


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
}
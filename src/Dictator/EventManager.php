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
		// TODO: Create BaseEvent and give normal name to object.
		$o = new BaseEvent();
		
		/** @var IBaseEventDAO $dao */
		$dao = \Dictator::skeleton(IBaseEventDAO::class);
		$dao->insertBaseEvent($o);
	}
}
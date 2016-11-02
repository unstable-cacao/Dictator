<?php
namespace Dictator\Base\DAO;


use Dictator\Object\BaseEvent;
use Squid\MySql\IMySqlConnector;


/**
 * @skeleton
 */
interface IBaseEventDAO
{
	/**
	 * @param BaseEvent $baseEvent
	 * @return bool
	 */
	public function insertBaseEvent(BaseEvent $baseEvent);
	
	/**
	 * @param IMySqlConnector $connector
	 */
	public function setConnection(IMySqlConnector $connector);
}
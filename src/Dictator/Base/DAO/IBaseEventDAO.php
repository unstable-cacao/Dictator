<?php
namespace Dictator\Base\DAO;


use Dictator\Object\BaseEvent;
use Squid\MySql\IMySqlConnector;


/**
 * @skeleton
 */
interface IBaseEventDAO
{
	public function insertBaseEvent(BaseEvent $baseEvent);
	
	public function setConnection(IMySqlConnector $connector);
}
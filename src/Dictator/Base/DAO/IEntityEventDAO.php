<?php
namespace Dictator\Base\DAO;


use Dictator\Object\EntityEvent;
use Squid\MySql\IMySqlConnector;


/**
 * @skeleton
 */
interface IEntityEventDAO
{
	/**
	 * @param IMySqlConnector $connector
	 */
	public function setConnection(IMySqlConnector $connector);
	
	/**
	 * @param EntityEvent $entityEvent
	 * @param array $parameters
	 * @return bool
	 */
	public function insertEntityEvent(EntityEvent $entityEvent, array $parameters);
}
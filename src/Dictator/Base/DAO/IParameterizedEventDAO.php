<?php
namespace Dictator\Base\DAO;


use Dictator\Object\ParameterizedEvent;
use Squid\MySql\IMySqlConnector;


/**
 * @skeleton
 */
interface IParameterizedEventDAO
{
	/**
	 * @param ParameterizedEvent $parameterizedEvent
	 * @param array $parameters
	 * @return bool
	 */
	public function insertParameterizedEvent(ParameterizedEvent $parameterizedEvent, array $parameters);
	
	/**
	 * @param IMySqlConnector $connector
	 */
	public function setConnection(IMySqlConnector $connector);
}
<?php
namespace Dictator\DAO;


use Dictator\Base\DAO\IParameterizedEventDAO;
use Dictator\Object\ParameterizedEvent;
use Squid\MySql\Impl\Connectors\MySqlAutoIncrementConnector;
use Squid\MySql\IMySqlConnector;


class ParameterizedEventDAO implements IParameterizedEventDAO
{
	/** @var MySqlAutoIncrementConnector */
	private $objectConnector;
	/** @var \Squid\MySql\IMySqlConnector */
	private $connector;
	
	
	/**
	 * @param IMySqlConnector $connector
	 */
	public function setConnection(IMySqlConnector $connector)
	{
		$this->connector = $connector;
		
		$this->objectConnector = new MySqlAutoIncrementConnector();
		$this->objectConnector
			->setConnector($this->connector)
			->setDomain(ParameterizedEvent::class)
			->setTable('ParameterizedEvent')
			->setIdField('ID');
	}
	
	/**
	 * @param ParameterizedEvent $parameterizedEvent
	 * @param array $parameters
	 * @return bool
	 */
	public function insertParameterizedEvent(ParameterizedEvent $parameterizedEvent, array $parameters)
	{
		return $this->objectConnector->save($parameterizedEvent) && $this->insertParameters($parameterizedEvent->ID, $parameters);
	}
	
	/**
	 * @param int $eventID
	 * @param array $parameters
	 * @return bool
	 */
	public function insertParameters($eventID, array $parameters)
	{
		$insert = $this->connector->insert()->into('Parameters', ['EventID', 'ParamName', 'ParamValue']);
		
		foreach ($parameters as $paramName => $paramValue)
		{
			$insert->values([$eventID, $paramName, $paramValue]);
		}
		
		return $insert->executeDml();
	}
}
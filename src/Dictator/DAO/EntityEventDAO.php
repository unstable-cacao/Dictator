<?php
namespace Dictator\DAO;


use Dictator\Base\DAO\IEntityEventDAO;
use Dictator\Object\EntityEvent;
use Squid\MySql\Impl\Connectors\MySqlAutoIncrementConnector;
use Squid\MySql\IMySqlConnector;


class EntityEventDAO implements IEntityEventDAO
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
			->setDomain(EntityEvent::class)
			->setTable('EntityEvent')
			->addIgnoreFields(['Created', 'Modified'])
			->setIdField('ID');
	}
	
	/**
	 * @param EntityEvent $entityEvent
	 * @param array $parameters
	 * @return bool
	 */
	public function insertEntityEvent(EntityEvent $entityEvent, array $parameters)
	{
		return $this->objectConnector->save($entityEvent) && $this->insertParameters($entityEvent->ID, $parameters);
	}
	
	/**
	 * @param int $eventID
	 * @param array $parameters
	 * @return bool
	 */
	public function insertParameters($eventID, array $parameters)
	{
		$insert = $this->connector->insert()->into('EntityParameters', ['EventID', 'ParamName', 'ParamValue']);
		
		foreach ($parameters as $paramName => $paramValue)
		{
			$insert->values([$eventID, $paramName, $paramValue]);
		}
		
		return $insert->executeDml();
	}
}
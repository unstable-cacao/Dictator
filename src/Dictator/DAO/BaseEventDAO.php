<?php
namespace Dictator\DAO;


use Dictator\Base\DAO\IBaseEventDAO;
use Dictator\Object\BaseEvent;
use Squid\MySql\Impl\Connectors\MySqlAutoIncrementConnector;
use Squid\MySql\IMySqlConnector;


class BaseEventDAO implements IBaseEventDAO
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
			->setDomain(BaseEvent::class)
			->setTable('BaseEvent')
			->setIdField('ID');
	}
	
	/**
	 * @param BaseEvent $baseEvent
	 * @return bool
	 */
	public function insertBaseEvent(BaseEvent $baseEvent)
	{
		return $this->objectConnector->save($baseEvent);
	}
}
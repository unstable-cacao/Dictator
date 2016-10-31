<?php
namespace Dictator;


use Dictator\Base\IConfig;
use Squid\MySql;


class Config implements IConfig
{
	/** @var MySql */
	private $squid;
	
	
	/**
	 * @param array $dbConnectionData
	 */
	public function configureConnection(array $dbConnectionData)
	{
		$this->squid = new MySql();
		$this->squid->config()->addConfig('main', $dbConnectionData);
	}
	
	/**
	 * @return MySql\IMySqlConnector
	 */
	public function getConnection()
	{
		return $this->squid->getConnector('main');
	}
}
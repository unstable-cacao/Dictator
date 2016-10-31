<?php
namespace Dictator\Base;


use Squid\MySql\IMySqlConnector;


/**
 * @skeleton
 */
interface IConfig
{
	/**
	 * @param array $dbConnectionData
	 */
	public function configureConnection(array $dbConnectionData);
	
	/**
	 * @return IMySqlConnector
	 */
	public function getConnection();
}
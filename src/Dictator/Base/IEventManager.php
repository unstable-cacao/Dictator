<?php
namespace Dictator\Base;


use Skeleton\ISingleton;


/**
 * @skeleton
 */
interface IEventManager extends ISingleton
{
	/**
	 * @return IConfig
	 */
	public function config();
	
	/**
	 * @param string $userID
	 * @param string $eventName
	 * @return bool
	 */
	public function baseEvent($userID, $eventName);
	
	/**
	 * @param string $userID
	 * @param string $eventName
	 * @param array $parameters
	 * @return bool
	 */
	public function parameterizedEvent($userID, $eventName, array $parameters);
}
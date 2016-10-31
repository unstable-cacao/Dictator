<?php


use Skeleton\Skeleton;


class Dictator
{
	/**
	 * @param string|null $interface
	 * @return mixed|Skeleton
	 */
	public static function skeleton($interface = null)
	{
		// TODO
	}
	
	public static function getEventManager()
	{
		return self::skeleton(\Dictator\Base\IEventManager::class);
	}
}
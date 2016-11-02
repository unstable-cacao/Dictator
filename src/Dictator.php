<?php


use Skeleton\Skeleton;


class Dictator
{
	/** @var Skeleton */
	private static $skeleton = null;
	
	
	private static function setUp()
	{
		if (self::$skeleton)
			return;
		
		self::$skeleton = new Skeleton();
		self::$skeleton
			->enableKnot()
			->setConfigLoader(
				new \Skeleton\ConfigLoader\DirectoryConfigLoader(__DIR__ . '/skeleton')
			);
	}
	
	
	/**
	 * @param string|null $interface
	 * @return mixed|Skeleton
	 */
	public static function skeleton($interface = null)
	{
		if (!self::$skeleton)
			self::setUp();
		
		if ($interface)
			return self::$skeleton->get($interface);
		
		return self::$skeleton;
	}
	
	/**
	 * @return mixed|Skeleton
	 */
	public static function getEventManager()
	{
		return self::skeleton(\Dictator\Base\IEventManager::class);
	}
}
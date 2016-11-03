<?php

spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
	if (strpos($className, 'Skeleton') === 0)
	{
		$path = __DIR__ . '/vendor/oktopost/skeleton/src/';
	}
	elseif (strpos($className, 'Objection') === 0)
	{
		$path = __DIR__ . '/vendor/oktopost/objection/src/';
	}
	elseif (strpos($className, 'Dictator') === 0)
	{
		$path = __DIR__ . '/src/';
	}
	elseif (strpos($className, 'Squid') === 0)
	{
		$path = __DIR__ . '/vendor/oktopost/squid/src/';
	}
	
	require_once $path . str_replace('\\', '/', $className) . '.php';
}
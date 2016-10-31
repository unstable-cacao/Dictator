<?php
namespace Base;


interface IEventManager
{
	public function config();
	
	public function baseEvent($UserID, $eventName);
}
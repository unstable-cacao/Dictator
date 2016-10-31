<?php
namespace Dictator;
/** @var \Skeleton\Base\IBoneConstructor $this */


use Dictator\Base\IConfig;
use Dictator\Base\IEventManager;


$this->set(IConfig::class, Config::class);
$this->set(IEventManager::class, EventManager::class);
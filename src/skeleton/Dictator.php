<?php
namespace Dictator;
/** @var \Skeleton\Base\IBoneConstructor $this */


use Dictator\Base\DAO\IBaseEventDAO;
use Dictator\Base\IConfig;
use Dictator\Base\IEventManager;
use Dictator\DAO\BaseEventDAO;


$this->set(IConfig::class, Config::class);
$this->set(IEventManager::class, EventManager::class);
$this->set(IBaseEventDAO::class, BaseEventDAO::class);
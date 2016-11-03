<?php
namespace Dictator;
/** @var \Skeleton\Base\IBoneConstructor $this */


use Dictator\Base\DAO\IBaseEventDAO;
use Dictator\Base\DAO\IEntityEventDAO;
use Dictator\Base\DAO\IParameterizedEventDAO;
use Dictator\Base\IConfig;
use Dictator\Base\IEventManager;
use Dictator\DAO\BaseEventDAO;
use Dictator\DAO\EntityEventDAO;
use Dictator\DAO\ParameterizedEventDAO;


$this->set(IConfig::class, Config::class);
$this->set(IEventManager::class, EventManager::class);
$this->set(IBaseEventDAO::class, BaseEventDAO::class);
$this->set(IParameterizedEventDAO::class, ParameterizedEventDAO::class);
$this->set(IEntityEventDAO::class, EntityEventDAO::class);
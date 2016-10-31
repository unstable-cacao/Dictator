<?php
namespace Base;


interface IConfig
{
	public function configureConnection(array $dbConnectionData);
}
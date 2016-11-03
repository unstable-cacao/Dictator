<?php
namespace Dictator\Base\Enum;


use Objection\TEnum;


class EntityAction
{
	use TEnum;
	
	
	const INSERT 	= 'insert';
	const UPDATE 	= 'update';
	const DELETE 	= 'delete';
	const SHOW 		= 'show';
}
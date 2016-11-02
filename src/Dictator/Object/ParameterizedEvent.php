<?php
namespace Dictator\Object;


use Objection\LiteSetup;


/**
 * @property int	$ParamsCount
 */
class ParameterizedEvent extends BaseEvent
{
	/**
	 * @return array
	 */
	protected function _setup()
	{		
		return array_merge(parent::_setup(), [
			'ParamsCount' => LiteSetup::createInt(0)
		]);
	}
}
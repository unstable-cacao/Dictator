<?php
namespace Dictator\Object;


use Objection\LiteSetup;
use Objection\LiteObject;


/**
 * @property int		$ID
 * @property \DateTime	$Created
 * @property int		$Modified
 * @property string		$EventName
 * @property int		$UserID
 */
class BaseEvent extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID' 		=> LiteSetup::createInt(null),
			'Created' 	=> LiteSetup::createDateTime(),
			'Modified' 	=> LiteSetup::createDateTime(),
			'EventName' => LiteSetup::createString(null),
			'UserID' 	=> LiteSetup::createInt(null)
		];
	}
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->Created = new \DateTime();
		$this->Modified = new \DateTime();
	}
}
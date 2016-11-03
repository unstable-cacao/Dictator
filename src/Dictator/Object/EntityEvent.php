<?php
namespace Dictator\Object;


use Dictator\Base\Enum\EntityAction;
use Objection\LiteObject;
use Objection\LiteSetup;


/**
 * @property int		$ID
 * @property \DateTime	$Created
 * @property int		$Modified
 * @property string		$ActionType
 * @property string		$EntityName
 * @property string		$UserID
 */
class EntityEvent extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'ID' 			=> LiteSetup::createInt(null),
			'Created' 		=> LiteSetup::createDateTime(),
			'Modified' 		=> LiteSetup::createInt(0),
			'ActionType' 	=> LiteSetup::createEnum(EntityAction::class, null),
			'EntityName' 	=> LiteSetup::createString(null),
			'UserID' 		=> LiteSetup::createString(null)
		];
	}
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->Created = new \DateTime();
		$this->Modified = time();
	}
}
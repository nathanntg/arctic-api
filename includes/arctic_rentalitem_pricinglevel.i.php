<?php

/**
 * Class Arctic_RentalItem_PricingLevel
 * @property int $rentalitemid
 * @property int $id
 * @property string $name
 * @property bool $default
 * @property bool $showonline
 * @property array $prices [ amnt => $0.00 , per => time_unit ,name => , cond => ]
 * @property string $createdon
 * @property string $modifiedon
 * @property bool $deleted
 */
class Arctic_RentalItem_PricingLevel extends ArcticModel
{
	public static function getApiPath() {
		// currently does not have a direct api call
		// just accessed as a subobject of rental items
		return null;
	}

	public function __construct() {
		parent::__construct();
	}
}

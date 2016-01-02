<?php

namespace app\modules\event\models;

use Yii;

class UnitEvent extends \app\modules\event\models\Event
{

	/**
	 * [aCustomerCreated description]
	 * @param  [type] $created_by  [description]
	 * @param  [type] $customer_id [description]
	 * @return [type]              [description]
	 */
	CONST ACTION_UNIT_CREATED = "UnitCreated";

	public function aCustomerCreated($created_by, $customer_id)
	{
		$this->action = self::ACTION_CUSTOMER_CREATED;
		
		//set the user if a user is logged in
		if(!\Yii::$app->user->isGuest)
		{
			$this->user = \Yii::$app->user->identity->username;
		}
		else
		{
			$this->user = 'anonym';
		}

		$myDate = new DateTime('now');

		$this->paramstring = (string)$created_by;
		$this->paramdateint = $myDate->format('U');
		$this->paramtext = 'Cusomter: #' . $customer_id . ' has been created';
		$this->mod_table = 'customer';
		$this->mod_id = $customer_id;

		if($this->validate()){
			return ($this->save());
		}
		else{
			return $this->errors;
		}
	}

}

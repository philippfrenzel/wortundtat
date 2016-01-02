<?php

namespace app\modules\event\models;

use Yii;
use DateTime;

class CustomerEvent extends \app\modules\event\models\Event
{

	/**
	 * [aCustomerCreated description]
	 * @param  [type] $created_by  [description]
	 * @param  [type] $customer_id [description]
	 * @return [type]              [description]
	 */
	CONST ACTION_CUSTOMER_CREATED = "CustomerCreated";

	public function aCustomerCreated($created_by, $customer_id)
	{
		$this->action = self::ACTION_CUSTOMER_CREATED;

		//set the user if a user is logged in
		if(isset(Yii::$app->user))
		{
			if(!\Yii::$app->user->isGuest)
			{
				$this->user = \Yii::$app->user->identity->username;
			}
			else
			{
				$this->user = 'anonym';
			}
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

	/**
	 * [aCustomerWFChange description]
	 * @param  integer $customer_id [description]
	 * @param  string $status [description]
	 * @return boolean              [description]
	 */
	CONST ACTION_CUSTOMER_WORKFLOW_CHANGED = "CustomerWorkflowChanged";

	public function aCustomerWFChange($customer_id, $status)
	{
		$this->action = self::ACTION_CUSTOMER_WORKFLOW_CHANGED;
		
		//set the user if a user is logged in
		if(isset(Yii::$app->user))
		{
			if(!\Yii::$app->user->isGuest)
			{
				$this->user = \Yii::$app->user->identity->username;
			}
			else
			{
				$this->user = 'anonym';
			}
		}
		else
		{
			$this->user = 'anonym';
		}

		$myDate = new DateTime('now');

		$this->paramstring = (string)$this->user;
		$this->paramdateint = $myDate->format('U');
		$this->paramtext = $status;
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

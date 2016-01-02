<?php

namespace app\modules\event\models;

use Yii;
use \DateTime;

class TemplateEvent extends \app\modules\event\models\Event
{

	/**
	 * [aCustomerCreated description]
	 * @param  [type] $created_by  [description]
	 * @param  [type] $template_id [description]
	 * @return [type]              [description]
	 */
	CONST ACTION_TEMPLATE_CREATED = "TemplateCreated";

	public function aTemplateCreated($created_by, $template_id)
	{
		$this->action = self::ACTION_TEMPLATE_CREATED;
		
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
		$this->paramtext = 'Template: #' . $template_id . ' has been created';
		$this->mod_table = 'template';
		$this->mod_id = $template_id;

		if($this->validate()){
			return ($this->save());
		}
		else{
			return $this->errors;
		}
	}

}

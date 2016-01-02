<?php

namespace app\modules\event\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \DateTime;

/**
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @copyright Frenzel GmbH 2015
 * @version 1.0
 * This is the model class for table "event".
 */
class Event extends \app\modules\event\models\base\EventBase
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

	/**
	 * Action: Benutzer login - means a User just has been logged in
	 *
	 * @param string $userId the epic id on which the berater will be changed
	 * @return boolean checks if the berater has been changed successfully or not
	 */
	CONST ACTION_USER_LOGIN = "UserLogin";

	public function aUserLogin($userId)
	{
		$this->action = self::ACTION_USER_LOGIN;
		
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

		$this->paramstring = (string)$userId;
		$this->paramdateint = $myDate->format('U');
		$this->paramtext = 'User: #' . $userId . ' has logged in.';
		$this->mod_table = 'user';
		$this->mod_id = $userId;

		if($this->validate()){
			return ($this->save());
		}
		else{
			return $this->errors;
		}	
	}
}

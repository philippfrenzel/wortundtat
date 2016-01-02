<?php

namespace app\modules\event\models;

use Yii;
use WebSocket\Client;
use WebSocket\ConnectionException;
use yii\helpers\Json;
use \DateTime;

class PhoneEvent extends \app\modules\event\models\Event
{

	/**
	 * [aCustomerCreated description]
	 * @param string $phonenumber the number of the incoming call
	 * @param string $type can be Incoming or Forwarded
	 * @param string $format can be the HTML or JSON
	 * @param number $site the external code of the site
	 * @param number $site_original the site that didn't pick the call in time

	 * @param  [type] $customer_id [description]
	 * @return [type]              [description]
	 */
	CONST ACTION_CALL_INCOMING = "CallIncoming";

	public function aIncomingCall($phonenumber,$type,$format='HTML',$site=NULL,$site_incoming=NULL)
	{
		$this->action = self::ACTION_CALL_INCOMING;
		
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

		$this->paramstring = $this->user;
		$this->paramdateint = $myDate->format('U');
		$this->paramtext = $phonenumber;
		$this->paramint = $site;
		$this->mod_table = $type;

		if($this->validate()){
			return ($this->save());
		}
		else{
			return $this->errors;
		}
	}

    /**
     * @param bool $insert
     * @param array $changedAttributes
     * @throws \WebSocket\BadOpcodeException
     */
	public function afterSave($insert, $changedAttributes)
	{
        Yii::trace('try to send a call information to site '.$this->paramint,'app\modules\event\PhoneEvent::afterSave');

		//initialize the response object
        $res = [];
        $res['type'] = 'call';
        $res['site'] = $this->paramint;

        $WSServer = \Yii::$app->params['websocketServerProtocol'].\Yii::$app->params['clientCallWebsocketServerHost'].':'.\Yii::$app->params['clientCallWebsocketServerPort'];
		
		$client = new Client($WSServer);
		$timeinfo = Yii::$app->formatter->asDateTime($this->updated_at);

$html=<<<EOF
	<div style="width:250px" class="event_notification">
		<div class="{$this->action}">
			<i class="fa fa-phone"></i> {$this->action}
		</div>
		<small>{$timeinfo}</small><br>
		<a href="#">
			You have an {$this->mod_table} call from {$this->paramtext}.
		</a>
	</div>
EOF;

        $res['data'] = $html;

        try
        {
            $client->send(Json::encode($res));
        }
        catch(ConnectionException $e)
        {
            echo "\n" . microtime(true) . " Client died: $e\n";
        }

		return parent::afterSave($insert, $changedAttributes);
	}

}
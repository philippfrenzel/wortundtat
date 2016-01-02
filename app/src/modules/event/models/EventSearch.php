<?php

namespace app\modules\event\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\event\models\Event;

/**
 * EventSearch represents the model behind the search form about Event.
 */
class EventSearch extends Model
{
	public $id;
	public $user;
	public $action;
	public $paramint;
	public $paramfloat;
	public $paramstring;
	public $paramtext;
	public $paramdate;
	public $paramdatetwo;
	public $paramdatethree;
	public $paramdateint;
	public $mod_table;
	public $mod_id;
	public $created_at;
	public $updated_at;
	public $deleted_at;

	public function rules()
	{
		return [
			[['id', 'paramint', 'paramdateint', 'mod_id', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
			[['user', 'action', 'paramstring', 'paramtext', 'paramdate', 'paramdatetwo', 'paramdatethree', 'mod_table'], 'safe'],
			[['paramfloat'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user' => 'User',
			'action' => 'Action',
			'paramint' => 'Paramint',
			'paramfloat' => 'Paramfloat',
			'paramstring' => 'Paramstring',
			'paramtext' => 'Paramtext',
			'paramdate' => 'Paramdate',
			'paramdatetwo' => 'Paramdatetwo',
			'paramdatethree' => 'Paramdatethree',
			'paramdateint' => 'Paramdateint',
			'mod_table' => 'Mod Table',
			'mod_id' => 'Mod ID',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'deleted_at' => 'Deleted At',
		];
	}

	public function search($params)
	{
		$query = Event::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'paramint' => $this->paramint,
            'paramfloat' => $this->paramfloat,
            'paramdate' => $this->paramdate,
            'paramdatetwo' => $this->paramdatetwo,
            'paramdatethree' => $this->paramdatethree,
            'paramdateint' => $this->paramdateint,
            'mod_id' => $this->mod_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

		$query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'paramstring', $this->paramstring])
            ->andFilterWhere(['like', 'paramtext', $this->paramtext])
            ->andFilterWhere(['like', 'mod_table', $this->mod_table]);

		return $dataProvider;
	}

	public function searchLog($params)
	{
		$query = Event::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => [
				'defaultOrder' => [
					'created_at' => SORT_DESC
				]
			],
			'pagination' => [
				'pageSize' => 5,
            ]
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id' => $this->id,
			'paramint' => $this->paramint,
			'paramfloat' => $this->paramfloat,
			'paramdate' => $this->paramdate,
			'paramdatetwo' => $this->paramdatetwo,
			'paramdatethree' => $this->paramdatethree,
			'paramdateint' => $this->paramdateint,
			'mod_id' => $this->mod_id,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
			'deleted_at' => $this->deleted_at,
		]);

		$query->andFilterWhere(['like', 'user', $this->user])
			->andFilterWhere(['like', 'action', $this->action])
			->andFilterWhere(['like', 'paramstring', $this->paramstring])
			->andFilterWhere(['like', 'paramtext', $this->paramtext])
			->andFilterWhere(['like', 'mod_table', $this->mod_table]);

		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}

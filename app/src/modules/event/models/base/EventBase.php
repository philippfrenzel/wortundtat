<?php

namespace app\modules\event\models\base;

use Yii;

/**
 * This is the base-model class for table "event".
 *
 * @property integer $id
 * @property string $user
 * @property string $action
 * @property integer $paramint
 * @property double $paramfloat
 * @property string $paramstring
 * @property string $paramtext
 * @property string $paramdate
 * @property string $paramdatetwo
 * @property string $paramdatethree
 * @property integer $paramdateint
 * @property string $mod_table
 * @property integer $mod_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class EventBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%event}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user','action'], 'required'],
            [['user', 'paramtext'], 'string'],
            [['paramint', 'paramdateint', 'mod_id', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['paramfloat'], 'number'],
            [['paramdate', 'paramdatetwo', 'paramdatethree'], 'safe'],
            [['action'], 'string', 'max' => 50],
            [['paramstring'], 'string', 'max' => 255],
            [['mod_table'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user' => Yii::t('app', 'User'),
            'action' => Yii::t('app', 'Action'),
            'paramint' => Yii::t('app', 'Paramint'),
            'paramfloat' => Yii::t('app', 'Paramfloat'),
            'paramstring' => Yii::t('app', 'Paramstring'),
            'paramtext' => Yii::t('app', 'Paramtext'),
            'paramdate' => Yii::t('app', 'Paramdate'),
            'paramdatetwo' => Yii::t('app', 'Paramdatetwo'),
            'paramdatethree' => Yii::t('app', 'Paramdatethree'),
            'paramdateint' => Yii::t('app', 'Paramdateint'),
            'mod_table' => Yii::t('app', 'Mod Table'),
            'mod_id' => Yii::t('app', 'Mod ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }
}

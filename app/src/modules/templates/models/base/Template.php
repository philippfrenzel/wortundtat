<?php

namespace app\modules\templates\models\base;

use Yii;

/**
 * This is the base-model class for table "app_template".
 *
 * @property integer $id
 * @property string $template_name
 * @property string $template_type
 * @property integer $is_active
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 * @property string $template_file
 * @property string $template_base_url
 * @property string $template_path
 * @property integer $template_size
 * @property string $template_upload_ip
 *
 * @property \app\modules\templates\models\User $user
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * @var file $file that will be uploaded to the model
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%template}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'user_id', 'created_at', 'updated_at', 'deleted_at','template_size'], 'integer'],
            [['user_id'], 'required'], //, 'created_at', 'updated_at'
            [['template_name', 'template_type','template_file','template_upload_ip','template_path','template_base_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'template_name' => Yii::t('app', 'Template Name'),
            'template_type' => Yii::t('app', 'Template Type'),
            'template_file' => Yii::t('app', 'Template File'),
            'is_active' => Yii::t('app', 'Is Active'),
            'user_id' => Yii::t('app', 'User'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\dektrium\user\models\User::className(), ['id' => 'user_id']);
    }




}

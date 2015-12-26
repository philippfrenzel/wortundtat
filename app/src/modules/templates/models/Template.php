<?php

namespace app\modules\templates\models;

use Yii;
use \app\modules\templates\models\base\Template as BaseTemplate;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "app_template".
 */
class Template extends BaseTemplate
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
}

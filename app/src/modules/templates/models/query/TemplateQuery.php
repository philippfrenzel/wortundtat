<?php

namespace app\modules\templates\models\query;

use Yii;
use yii\db\ActiveQuery;

/**
 * The scopes for the template table
 * @copyright Frenzel GmbH
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @version 0.1.0
 */
class TemplateQuery extends ActiveQuery
{
    /**
     * show only the entries related to the current user (setted of for administrator)
     * @return [type] [description]
     */
    public function client()
    {
        if(!\Yii::$app->user->isGuest && !\Yii::$app->user->identity->isAdmin)
        {
            return $this->andWhere(['user_id' => \Yii::$app->user->identity->id]);
        }
        return $this;
    }

    /**
     * only not delted records should be returned, deleted would mean they are not null anymore within field value
     * @return [type] [description]
     */
    public function active()
    {
        if(!\Yii::$app->user->isGuest && !\Yii::$app->user->identity->isAdmin)
        {
            $this->andWhere(['deleted_at' => NULL]);
        }
        return $this;
    }
}
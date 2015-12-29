<?php
/**
 * Created by PhpStorm.
 * User: philippfrenzel
 * Date: 12/26/15
 * Time: 1:39 PM
 */

namespace app\modules\templates\controllers\api\v1;

use Yii;
use yii\rest\ActiveController;
use app\modules\templates\models\Template;

class TemplateController extends ActiveController
{
    /**
     * @var string modelClass which will be referenced for managing the requests
     */
    public $modelClass = 'app\modules\templates\models\Template';

    /**
     * actionView that will be executed while the user wants to show a record
     * @param $id
     */
    public function actionProcess($id){
        $model = $this->findModel($id);
        $model->generateDoc(Yii::$app->request->getBodyParams());
    }

    /**
     * @param $id
     * @return null|static
     * @throws HttpException
     */
    private function findModel($id){
        if (($model = Template::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }

}

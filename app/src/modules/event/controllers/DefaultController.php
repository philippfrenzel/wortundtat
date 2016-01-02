<?php

namespace app\modules\event\controllers;

use app\modules\event\models\Event;
use app\modules\event\models\EventSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\AccessControl;
use yii\helpers\Url;

class DefaultController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'matchCallback' => function ($rule, $action) {
							return \Yii::$app->user->can(
								$this->module->id . '_' . $this->id . '_' . $action->id,
								['route' => true]
							);
						},
					]
				]
			]
		];
	}
	
    /**
	 * Lists all Event models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$this->layout = '/container';

		$searchModel = new EventSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Event model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Event model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Event;

		try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(Url::previous());
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model,]);
	}

	/**
	 * Updates an existing Event model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Event model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the Event model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Event the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Event::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}

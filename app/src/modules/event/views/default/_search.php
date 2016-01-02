<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\EventSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="event-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'user') ?>

		<?= $form->field($model, 'action') ?>

		<?= $form->field($model, 'paramint') ?>

		<?= $form->field($model, 'paramfloat') ?>

		<?php // echo $form->field($model, 'paramstring') ?>

		<?php // echo $form->field($model, 'paramtext') ?>

		<?php // echo $form->field($model, 'paramdate') ?>

		<?php // echo $form->field($model, 'paramdatetwo') ?>

		<?php // echo $form->field($model, 'paramdatethree') ?>

		<?php // echo $form->field($model, 'paramdateint') ?>

		<?php // echo $form->field($model, 'mod_table') ?>

		<?php // echo $form->field($model, 'mod_id') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'deleted_at') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\templates\models\TemplateSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="template-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

	<div class="row">
		<div class="col-md-4"><?= $form->field($model, 'template_name') ?></div>
		<div class="col-md-4"><?= $form->field($model, 'template_type') ?></div>
		<div class="col-md-4"><?= $form->field($model, 'is_active')->checkbox() ?></div>
	</div>

		<?php // $form->field($model, 'user_id') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'deleted_at') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

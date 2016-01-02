<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\Event $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'user')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'created_at')->textInput() ?>
			<?= $form->field($model, 'updated_at')->textInput() ?>
			<?= $form->field($model, 'paramtext')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'paramint')->textInput() ?>
			<?= $form->field($model, 'paramdateint')->textInput() ?>
			<?= $form->field($model, 'mod_id')->textInput() ?>
			<?= $form->field($model, 'deleted_at')->textInput() ?>
			<?= $form->field($model, 'paramfloat')->textInput() ?>
			<?= $form->field($model, 'paramdate')->textInput() ?>
			<?= $form->field($model, 'paramdatetwo')->textInput() ?>
			<?= $form->field($model, 'paramdatethree')->textInput() ?>
			<?= $form->field($model, 'action')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'paramstring')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'mod_table')->textInput(['maxlength' => 100]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Event',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

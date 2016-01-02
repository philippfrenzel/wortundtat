<?php

use \yii\helpers\Html;

//item for discount list view
?>

<div style="width:250px" class="event_notification">
	<div class="EventLog">
		<i class="fa fa-feed"></i> <?= Html::encode($model->action) ?>
	</div>
	<small>On: <?= Html::encode(\Yii::$app->formatter->asDateTime($model->updated_at)) ?></small><br>
		<?= Html::encode($model->paramtext) ?><br>
</div>

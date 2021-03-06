<?php

use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: philippfrenzel
 * Date: 12/23/15
 * Time: 9:41 PM
 */
?>

<div class="row">
    <div class="col-md-4">
        <h2>
            <i class="fa fa-file"></i>
            <?= $model->template_name; ?>
        </h2>
    </div>
    <div class="col-md-4">
        <table class="table">
            <tr>
                <td>Document ID:</td>
                <td>#<?= $model->id; ?></td>
            </tr>
            <tr>
                <td>REST-URL:</td>
                <td><?=Url::to(['/api/v1/template/view/' . $model->id]) ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table">
            <tr>
                <td>File:</td>
                <td><?= $model->template_file; ?></td>
            </tr>
            <tr>
                <td>Type:</td>
                <td><?= $model->template_type; ?></td>
            </tr>
            <tr>
                <td>Size:</td>
                <td><?= $model->template_size; ?></td>
            </tr>
        </table>
    </div>
</div>
<a href="<?= Url::to(['/templates/template/template-view','id'=>$model->id]); ?>">view</a>
<hr>

<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title .= 'User Home';
?>

<div class="container-fluid">
    <h2 class="text-center">Wortundtat User Dashboard</h2>
    <hr>
    <div class="container">
        <div class="col-md-4 bg-primary">
            <h3><i class="fa fa-file"></i> Documents</h3>
            <table class="table">
                <tr>
                    <td>No of Templates Online: 1</td>
                </tr>
                <tr>
                    <td>No of Documents generated today: 23</td>
                </tr>
                <tr>
                    <td>No of Errors: 0</td>
                </tr>
                <tr>
                    <td class="text-right"><a href="<?= Url::to('/templates/template') ?>" class="btn btn-lg btn-default">Manage your documents</a></td>
                </tr>
            </table>
        </div>
        <div class="col-md-4 bg-default">
            <?= \app\modules\templates\widgets\stats\DailyStats::widget(); ?>
        </div>
        <div class="col-md-4 bg-info">
            <h3><i class="fa fa-user"></i> Profile</h3>
            <table class="table">
                <tr>
                    <td>Username</td>
                    <td><?= Yii::$app->user->identity->username; ?></td>
                </tr>
                <tr>
                    <td>Mail</td>
                    <td><?= Yii::$app->user->identity->email; ?></td>
                </tr>
                <tr>
                    <td>API-Key</td>
                    <td><?= Yii::$app->user->identity->authKey; ?></td>
                </tr>
                <tr>
                    <td class="text-right" colspan="2"><a href="<?= Url::to('/user/profile') ?>" class="btn btn-lg btn-default">Manage your profile</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>

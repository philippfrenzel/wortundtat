<?php

use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

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
            <h3>Statistic</h3>
            <?= Highcharts::widget([
                'options' => [
                    'chart' => [
                        'height' => '200',
                        'type' => 'area',
                    ],
                    'title' => ['text' => ' '],
                    'xAxis' => [
                        'categories' => ['1:00','2:00','3:00','4:00','5:00','6:00','7:00','8:00','9:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00','24:00']
                    ],
                    'yAxis' => [
                        'title' => ['text' => 'No of Requests']
                    ],
                    'series' => [
                        ['name' => 'Req', 'data' => [1, 0, 4, 1, 1, 0, 4, 1, 1, 0, 4, 1, 1, 0, 4, 1, 1, 1, 0, 4, 1, 1, 1, 1]],
                    ]
                ]
            ]);
            ?>
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

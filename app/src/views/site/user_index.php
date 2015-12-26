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
            <h3>Documents</h3>
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
                    <td><a href="<?= Url::to('/templates/template') ?>" class="btn btn-lg btn-default">Manage your documents</a></td>
                </tr>
            </table>
        </div>
        <div class="col-md-8 bg-default">
            <h3>TBD</h3>
        </div>
    </div>
</div>

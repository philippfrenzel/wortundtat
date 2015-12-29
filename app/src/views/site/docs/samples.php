<?php

use yii\helpers\Url;

?>

<div class="pull-right">
    <small>Menu</small>
    <ul>
        <li>
            <a href="<?= Url::to(['/site/view','page'=>'quickstart']) ?>">Quickstart</a>
        </li>
        <li>
            <a href="<?= Url::to(['/site/view','page'=>'api']) ?>">API Documentation</a>
        </li>
        <li>
            <a href="<?= Url::to(['/site/view','page'=>'samples']) ?>">Samples</a>
        </li>
    </ul>
</div>
<hr>

<h1>Samples</h1>

<h2>PHP Code with Guzzle</h2>


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

<h1>API Documentation</h1>
<h2>Landing Point</h2>
POST-REQUEST:
<ul>
    <li>
        <code>https://wor.tundt.at/api/v1/template/view/YOURDOCID</code>
    </li>
</ul>
<h2>document</h2>

<h3>key</h3>
<p>the key is the api-key which can be found under your profile information</p>

<h3>target</h3>
<p>How you wanna recieve the merged docment. can be:</p>
<ul>
    <li>binary</li>
    <li>mail</li>
    <li>link</li>
</ul>
<div class="text-warning">
    The Mail will be send to your account email. If you need other recievers, pls. let us know and we'll show you how to extend this functionality.
</div>

<h2>fields</h2>
<h3>usage</h3>
<p>Every values pair of the fields array consists from a key - value pair. The key ist the match criteria for the template placeholder in the format:</p>
<code>${fieldname}</code>

<h3>sample</h3>
<pre><code>"fields" : [
        {"fieldname" : "fieldvalue"},
        {"fieldnametwo" : "fieldvalue"}
]
</code></pre>
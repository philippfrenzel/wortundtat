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

<h1>QuickStart</h1>
<h2>General Overview</h2>
<p>
    As you can see in the following sketch, our service allows you to manage your templates zentralised and process the merge with your application data via REST-Requests.
</p>
<p>
    <img src="/gfx/RESTSCHEMA.png" alt="Schema" class="img-responsive">
</p>
<h2>Hello World Sample</h2>
<p>Step One:</p>
Generate a HelloWord.docx document and copy the following line of text: <br>
<code>
    Here is your sample - Hello <b>${name}</b>!
</code>
<p>Step Two:</p>
Upload the template to wor.tundt.at and name it "HelloWorld".
<p>Step Three:</p>
Send a POST-REST Request with the following data: <br>
<code>https://wor.tundt.at/api/v1/template/view/1</code>
<pre><code>{
    "template" : {
        "key" : "acf123#322ecfrdsdt2345!",
        "docid" : 1,
        "doc" : "HelloWorld",
        "format" : "Word2013",
        "target" : "binary",
        "fields" : [
            {"name" : "Paul Panther"},
            {"vorname" : "Ubekannt"}
        ]
    }
}
</code></pre>

<p>Step Four:</p>

<h2>User Manual</h2>
<h3>User Dashboard</h3>

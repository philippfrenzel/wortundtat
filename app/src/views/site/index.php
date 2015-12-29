<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title .= 'Home';
?>

<div class="jumbotron" id="home">
    <div class="container">
        <div id="intro">
            <h1>REST-API Document Generator!</h1>
            <p class="lead">Generate WORD, EXCEL and POWERPOINT Documents on the REST</p>
            <p>&nbsp;</p>
            <div class="clearfix">
            </div>
            <div class="text-center">
                <a href="<?= Url::to('/site/view') ?>" class="btn btn-primary btn-lg">Documentation</a>
                <a href="<?= Url::to(['/site/view','page' => 'samples']) ?>" class="btn btn-primary btn-lg">Hello World!</a>
                <a href="<?= Url::to('/user/register') ?>" class="btn btn-danger btn-lg">Registration</a>
                <a href="<?= Url::to('/user/login') ?>" class="btn btn-success btn-lg">Sign-Up (Social Auth)</a>
            </div>
        </div>
    </div>
</div>


<div id="site-index">

    <h2 class="text-center">About the solution</h2>
    <hr>
    <div class="container">
        <div class="process">
            <div class="process-row">
                <div class="process-step">
                    <button type="button" class="btn btn-warning btn-circle" disabled="disabled"><i class="fa fa-gears fa-3x"></i></button>
                    <p>Your Application</p>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-paper-plane-o fa-3x"></i></button>
                    <p>REST or XML request</p>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-magic fa-3x"></i></button>
                    <p>Merge Template</p>
                </div>
                <div class="process-step">
                    <button type="button" class="btn btn-info btn-circle" disabled="disabled"><i class="fa fa-file-word-o fa-3x"></i></button>
                    <p>document stream or mail</p>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </div>

    <div class="container-fluid bg-info">
        <h2 class="text-center">How it works</h2>
        <hr>
        <div class="container">
            <div class="col-md-4">
                <h3>General Overview</h3>
                <p>Your application sends a JSON or XML request with:</p>
                <ul>
                    <li>The Template Name - which will be used for the data merge</li>
                    <li>Your Data - JSON or XML formated data with which to populate the template</li>
                    <li>Output format(s) - PDF, DOC, ODT etc.</li>
                    <li>Return Type - can be stream back to application, email, download url</li>
                </ul>
                <img src="/gfx/RESTSCHEMA.png" alt="Schema" class="img-responsive">
            </div>
            <div class="col-md-4">
                <h3>Quick Step by Step Sample:</h3>
                <p>Step One:</p>
                Generate a HelloWord.docx document and copy the following line of text: <br>
                <code>
                    Here is your sample - Hello <b>${name}</b>!
                </code>
                <p>Step Two:</p>
                Upload the template to wor.tundt.at and name it "HelloWorld".
                <p>Step Three:</p>
                Send a POST - REST Request with the following data: <br>
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
            </div>
            <div class="col-md-4">
                <p>Step Four:</p>
                As response to your request, you'll recieve a binary file which will contain the following word document:

                <h3>Your Benefits:</h3>
                <p>
                    Wor t und t at is your solution for a centralized template management.
                    It is:
                </p>
                <ul>
                    <li>Simple</li>
                    <li>Flexible</li>
                    <li>Easy to Integrate with your existing solutions</li>
                    <li>Reliable</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2 class="text-center">Pricing</h2>
        <hr>
        <div class="container">
            <div class="col-md-4 bg-default">
                <h3>Free</h3>
                <small class="pull-right"><b>0,- </b>USD/mth.</small>
                <table class="table">
                    <tr>
                        <td>100 REQUESTS PER DAY</td>
                    </tr>
                    <tr>
                        <td>ONLINE SUPPORT</td>
                    </tr>
                    <tr>
                        <td>
                            Manage up to 50 templates
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 bg-primary">
                <h3>SMB</h3>
                <small class="pull-right"><b>50,- </b>USD/mth.</small>
                <table class="table">
                    <tr>
                        <td>1000 REQUESTS PER DAY</td>
                    </tr>
                    <tr>
                        <td>ONLINE/PHONE SUPPORT</td>
                    </tr>
                    <tr>
                        <td>
                            Manage up to 500 templates
                        </td>
                    </tr>
                    <tr>
                        <td>1 day online storage of processed documents</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 bg-warning">
                <h3>ENTERPRISE</h3>
                <small class="pull-right"><b>250,- </b>USD/mth.</small>
                <table class="table">
                    <tr>
                        <td>10000 REQUESTS PER DAY *</td>
                    </tr>
                    <tr>
                        <td>ONLINE/PHONE SUPPORT</td>
                    </tr>
                    <tr>
                        <td>
                            unlimited templates
                        </td>
                    </tr>
                    <tr>
                        <td>1 month online storage, additional individual storage providers (DropBox/AWS/WebDav)</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <small>* Because of the server management, if you need to process more than 10000 documents a day, we need to cluster your account, why an additional enterprise plan will be requiered.</small>
    </div>

    <div class="container-fluid bg-primary">
        <?= $this->render('contact',['model' => new app\models\ContactForm()]); ?>
    </div>

</div>

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
                <a href="<?= Url::to('/docs') ?>" class="btn btn-primary btn-lg">Documentation</a>
                <a href="https://github.com/phundament/app/releases" class="btn btn-primary btn-lg">Hello World!</a>
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

            </div>
            <div class="col-md-4">
                <h3>Your Benefits:</h3>
                <p>
                    Wor t und t at is your solution for a centralized template management.
                </p>
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
                        <td> - </td>
                    </tr>
                    <tr>
                        <td> - </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 bg-info">
                <h3>SMB</h3>
                <small class="pull-right"><b>20,- </b>USD/mth.</small>
                <table class="table">
                    <tr>
                        <td>10000 REQUESTS PER DAY</td>
                    </tr>
                    <tr>
                        <td>ONLINE SUPPORT</td>
                    </tr>
                    <tr>
                        <td> - </td>
                    </tr>
                    <tr>
                        <td> - </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 bg-warning">
                <h3>ENTERPRISE</h3>
                <small class="pull-right"><b>100,- </b>USD/mth.</small>
                <table class="table">
                    <tr>
                        <td>UNLIMITED REQUESTS PER DAY</td>
                    </tr>
                    <tr>
                        <td>ONLINE SUPPORT</td>
                    </tr>
                    <tr>
                        <td> - </td>
                    </tr>
                    <tr>
                        <td> - </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>

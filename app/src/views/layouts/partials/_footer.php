<?php

use yii\helpers\Url;

?>

<div class="footer-wrapper">
    <footer>
        <div class="container">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Frenzel GmbH</h3>
                        <address>
                            Hohewartstr.32 <br>
                            70469 Stuttgart <br>
                            Germany
                        </address>
                        <p>Tel.: +49 7964 33 17 55</p>
                        <p>Mail.: info (at) frenzel.net</p>
                    </div>
                    <div class="col-md-4">
                        <h3>Documentation</h3>
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
                </div>
            </div>
    </footer>
</div>
</div>
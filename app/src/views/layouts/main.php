<?php
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use kartik\growl\Growl;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = $this->title . ' - ' . Yii::$app->params['appName'];
AppAsset::register($this);
xj\modernizr\ModernizrAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?= Growl::widget([
        'type'  => Growl::TYPE_INFO,
        'icon'  => 'glyphicon glyphicon-ok-sign',
        'title' => 'Hinweis',
        'delay' => 0,
        'showSeparator' => true,
        'useAnimation' => true,
        'body'  => Yii::$app->session->getFlash('success'),
        'pluginOptions' => [
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);?>
<?php elseif (Yii::$app->session->hasFlash('error')): ?>
    <?= Growl::widget([
        'type'  => Growl::TYPE_WARNING,
        'icon'  => 'glyphicon glyphicon-ok-sign',
        'title' => 'Alert',
        'delay' => 0,
        'showSeparator' => true,
        'useAnimation' => true,
        'body'  => Yii::$app->session->getFlash('error'),
        'pluginOptions' => [
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);?>
<?php endif; ?>

<div class="wrap">

    <?php
    NavBar::begin(
        [
            'brandLabel' => '<i class="fa fa-retweet"></i>  ' . getenv('APP_NAME') .'(beta)',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default',
            ],
        ]
    );
    echo Nav::widget(
        [
            'options' => ['class' => 'navbar-nav'],
            'encodeLabels' => false,
            'items' => \dmstr\modules\pages\models\Tree::getMenuItems('root_' . Yii::$app->language),
        ]
    );
    $menuItems = [];

    $menuItems[] = ['label' => 'Documentation', 'url' => ['/site/view']];

    if (Yii::$app->hasModule('user')) {
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/user/registration/register']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
        } else {
            $menuItems[] = [
                'label' => '<i class="glyphicon glyphicon-user"></i> ' . Yii::$app->user->identity->username,
                'options' => ['id' => 'link-user-menu'],
                'items' => [
                    [
                        'label' => '<i class="glyphicon glyphicon-user"></i> Profile',
                        'url' => ['/user/profile/show', 'id' => \Yii::$app->user->id],
                    ],
                    '<li class="divider"></li>',
                    [
                        'label' => '<i class="glyphicon glyphicon-log-out"></i> Logout',
                        'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post', 'id' => 'link-logout']
                    ],
                ]
            ];
            $menuItems[] = [
                'label' => '<i class="glyphicon glyphicon-cog"></i>',
                'url' => ['/backend'],
                'visible' => Yii::$app->user->can(
                        'backend_default'
                    ) || (isset(Yii::$app->user->identity) && Yii::$app->user->identity->isAdmin)
            ];
        }
    }
    echo Nav::widget(
        [
            'options' => ['class' => 'navbar-nav navbar-right'],
            'encodeLabels' => false,
            'items' => $menuItems,
        ]
    );
    NavBar::end();
    ?>

    <div class="container">
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </div>

    <?= $content ?>

</div>

<?= $this->render('partials/_footer'); ?>

<!-- Info Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <?= $this->render('_modal') ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

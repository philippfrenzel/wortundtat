<?php
namespace app\modules\event\views\widgets;

use Yii;
use app\modules\event\models\EventSearch;
use yii\widgets\ListView;

/**
 * Created by PhpStorm.
 * User: philippfrenzel
 * Date: 10/17/15
 * Time: 1:29 PM
 */

class EventListWidget extends \yii\bootstrap\Widget
{

    public function run()
    {
        $searchModel  = new EventSearch;
        $dataProvider = $searchModel->searchLog($_GET);

        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '@app/modules/event/views/widgets/views/_event_list',
            'layout' => '{items}',
            'viewParams' => [
                'fullView' => true,
                'context' => 'event-log-page',
            ],
        ]);
    }

}

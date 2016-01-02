<?php
/**
 * Created by PhpStorm.
 * User: philippfrenzel
 * Date: 1/2/16
 * Time: 8:30 PM
 */

namespace app\modules\templates\widgets\stats;

class DailyStats extends \yii\bootstrap\Widget
{
    /**
     * @var $user_id default null
     */
    public $user = NULL;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * function run
     *
     * @return mixed
     */
    public function run()
    {
        $dataset = \app\modules\event\models\Event::find()
            ->SELECT([
                'FROM_UNIXTIME(created_at, \'%H\' ) AS created_at',
                'COUNT(created_at) AS mod_id'
            ])
            ->where(
                'FROM_UNIXTIME(created_at, \'%Y%m%d\' ) = DATE_FORMAT(NOW(),\'%Y%m%d\')'
            )
            ->groupBy(['FROM_UNIXTIME(created_at, \'%H\' )'])
            ->orderBy('created_at ASC')
            ->limit(24)
            ->all();

        $labels = [];
        $values = [];

        foreach($dataset AS $data)
        {
            $labels[] = $data->created_at;
            $values[] = $data->mod_id;
        }

        return $this->render('@app/modules/templates/widgets/stats/views/_statistic', [
            'labels'  => $labels,
            'values' => $values
        ]);
    }
}
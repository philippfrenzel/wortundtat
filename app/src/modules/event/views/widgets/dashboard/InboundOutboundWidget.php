<?php

namespace app\modules\event\views\widgets\dashboard;

/**
 * class RateChartWidget
 */
class InboundOutboundWidget extends \yii\bootstrap\Widget
{

    public function run()
    {
        /*$dashboard = \app\modules\prospecting\models\Prospecting::find()
            ->select(
                [
                    "SUBSTRING_INDEX({{prospecting}}.status,'/',-1) AS Category",
                    'count(DISTINCT {{prospecting}}.customer_id) AS NoOfLeads'
                ])
            ->joinWith('customer')
            ->where('{{prospecting}}.deleted_at IS NULL')
            ->currentSite()
            ->groupBy('{{prospecting}}.status')
            ->all();

        $labels = [];
        $values = [];

        foreach($dashboard AS $datapoint)
        {
            $values[] = ['name'=>$datapoint->Category,'y'=> (float)$datapoint->NoOfLeads];
        }
        */
        return $this->render('@app/modules/event/views/widgets/dashboard/views/_inbound_outbound', [
            //'labels'  => $labels,
            //'values' => $values
        ]);
    }
}
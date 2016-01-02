<?php
/**
 * Created by PhpStorm.
 * User: philippfrenzel
 * Date: 1/2/16
 * Time: 8:42 PM
 */

use miloschuman\highcharts\Highcharts;

?>

<h3><i class="fa fa-dashboard"></i> Statistic</h3>
<?= Highcharts::widget([
    'options' => [
        'chart' => [
            'height' => '200',
            'type' => 'area',
        ],
        'title' => ['text' => ' '],
        'xAxis' => [
            'categories' => $labels
        ],
        'yAxis' => [
            'title' => ['text' => 'No of Requests']
        ],
        'series' => [
            ['name' => 'Req', 'data' => $values],
        ]
    ]
]);
?>

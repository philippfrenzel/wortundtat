<?php
/**
 * Created by PhpStorm.
 * User: philippfrenzel
 * Date: 10/20/15
 * Time: 2:34 PM
 */
?>

<div class="panel">

    <div class="panel-body">
        <?=
        \dosamigos\highcharts\HighCharts::widget([
            'clientOptions' => [
                'chart' => [
                    'type' => 'bar',
                    'height' => 300,
                ],
                'title' => [
                    'text' => 'User Activity'
                ],
                'yAxis' => [
                    'title' =>
                        ['text' => 'No of Actions']
                ],
                'xAxis' => [
                    'categories' => [
                        'User 1','User 4','User 7','User 2','User 12'
                    ]
                ],
                'credits' => ['enabled' => false],
                'series' => [
                    [
                        'name' => 'User',
                        'data' => [25, 17, 12, 11, 8]
                    ]
                ]
            ]
        ]);
        ?>
    </div>

</div>


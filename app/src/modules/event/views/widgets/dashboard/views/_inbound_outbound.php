<div class="panel">

    <div class="panel-body">
        <?=
        \dosamigos\highcharts\HighCharts::widget([
            'clientOptions' => [
                'chart' => [
                    'type' => 'line',
                    'height' => 300,
                ],
                'title' => [
                    'text' => 'Inbound Outbound Calls Today'
                ],
                'yAxis' => [
                  'title' =>
                  ['text' => 'No of Calls']
                ],
                'xAxis' => [
                  'categories' => [
                      '08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00'
                  ]
                ],
                'credits' => ['enabled' => false],
                'series' => [
                    [
                        'name' => 'Inbound',
                        'data' => [7, 9, 12, 14, 10, 9, 8, 9, 11, 14, 10, 5]
                    ],
                    [
                        'name' => 'Outbound',
                        'data' => [7, 6, 9, 11, 9, 7, 10, 13, 9, 10, 13, 9]
                    ],
                ]
            ]
        ]);
        ?>
    </div>

</div>

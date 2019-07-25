<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>统计表</title>
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <style type="text/css">
    $ {
        demo.css
    }
    </style>
    <script type="text/javascript">
    $(function() {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: '员工<?php echo ($name); ?> 考勤统计表'
            },
            subtitle: {
                text: '<?php echo ($post['begintime']); ?> 到 <?php echo ($post['endtime']); ?>'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '次数'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '<b>{point.y:.0f} 次</b>'
            },
            series: [{
                name: '考勤情况',
                data: <?php echo ($str); ?>,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.0f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
    </script>
</head>

<body>
    <script src="/Public/Admin/plugin/charts/js/highcharts.js"></script>
    <script src="/Public/Admin/plugin/charts/js/modules/exporting.js"></script>
    <div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
</body>

</html>
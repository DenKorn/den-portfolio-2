<?php
use backend\assets\ActivityAsset;
use yii\web\View;

$this->title = 'Visitors activity';
$bundle = ActivityAsset::register($this);
$this->registerJS("

google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          $diagrammData
        ]);

        var options = {
          title: '',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

", View::POS_END);
?>

<h1>Visitors activity stats</h1>
<div id="chart_div" style="width: 100%; height: 500px;"></div>

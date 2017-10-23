<?php
include_once 'header.php';
include_once 'examClass.php';
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses', 'Test'],
                ['2004',  1000,      400, 200],
                ['2005',  1170,      460, 300],
                ['2006',  660,       1120, 400],
                ['2007',  1030,      540, 500]
            ]);
            var options = {
                title: '',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
<div class="container">
<div id="curve_chart" style="width: 900px; height: 500px"></div>
</div>

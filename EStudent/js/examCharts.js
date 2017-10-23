var jsonContent;
$(document).ready(function () {
    fillChart();
});
function fillChart() {
    examId =  $("#chooseExam").val();
    $.ajax({
        method: "POST",
        url: "postGetChartJson.php",
        data: "examId="+examId,
        success: function (result) {
            jsonContent = JSON.parse(result);
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            var arr = [];
            arr['Pass/Fail'] = 'Number of pass/fail';
            arr['Pass'] = jsonContent.pass;
            arr['Fail'] = jsonContent.fail;
        }
    });
}
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Pass/Fails', 'Number'],
        ['Pass',     jsonContent.pass],
        ['Fail',     jsonContent.fail]
    ]);
    var options = {
        title: 'Exam statistics',
        is3D: true,
    };
    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
}
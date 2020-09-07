const colors = ['#e76f51', '#f4a261', '#e9c46a', '#2a9d8f', '#264653']
let myChart = null;

window.onload = function () {
    initDatePicker();
    initChart();
    getChartData();
    bindChangeEvent();
};

function initDatePicker() {
    $('#startdate').datetimepicker({
        format: 'L',
        locale: 'it'
    });
    $('#enddate').datetimepicker({
        format: 'L',
        locale: 'it',
        useCurrent: false
    });
    $("#startdate").on("change.datetimepicker", function (e) {
        $('#enddate').datetimepicker('minDate', e.date);
    });
    $("#enddate").on("change.datetimepicker", function (e) {
        $('#startdate').datetimepicker('maxDate', e.date);
    });
}

function initChart() {
    let ctx = document.getElementById('chart').getContext('2d')
    myChart = new Chart(ctx, {
        type: 'line'
    });
}

function bindChangeEvent() {
    $("#dimension").change(getChartData);
    $("#startdate").on("change.datetimepicker", getChartData);
    $("#enddate").on("change.datetimepicker", getChartData);
}

function getChartData() {
    if (myChart == null) {
        return;
    }

    let dimension = $('#dimension').val();
    let room_id = $('#room-id').text();
    let start = $('#start').val();
    let end = $('#end').val();

    $.ajax({
        dataType: "json",
        type: "GET",
        url: "/api/data/charts",
        data: {
            dimension: dimension,
            room: room_id,
            start: start,
            end: end
        },
        success: drawChart
    });
}

function drawChart(data) {
    let ctx = $('#chart');
    let alert = $('#erroralert');

    if ('error' in data) {
        ctx.hide();
        alert.show();

        $('#alertmessage').html('<strong>Error</strong> ' + data['error'])
    } else {
        ctx.show();
        alert.hide();

        let measurements = data['measurements']

        console.log(measurements)

        myChart.data.labels = data['labels'];
        myChart.data.datasets = [];

        measurements.forEach(function (measure, index) {
            myChart.data.datasets.push({
                label: measure['description'],
                data: measure['data'],
                borderColor: colors[index % colors.length],
                backgroundColor: 'rgba(0,0,0,0)',
            });
        });

        myChart.update();
    }
}

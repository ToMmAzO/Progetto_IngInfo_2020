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
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: "",
                data: [],
                backgroundColor: 'rgba(0, 0, 0, 0)',
                borderColor: 'rgba(231, 111, 81, 1)',
                pointBackgroundColor: 'rgba(231, 111, 81, 1)'
            }],
        }
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

    let dimension = $("#dimension").val();
    let start = $("#start").val();
    let end = $("#end").val();

    $.ajax({
        dataType: "json",
        type: "GET",
        url: "/api/data/charts",
        data: {
            dimension: dimension,
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
        let labels = [];
        let values = [];

        for (let i = 0; i < measurements.length; ++i) {
            labels.push(measurements[i]['date']);
            values.push(measurements[i]['value']);
        }

        myChart.data.labels = labels;
        myChart.data.datasets[0].label = data['unit'];
        myChart.data.datasets[0].data = values;
        myChart.update();
    }
}

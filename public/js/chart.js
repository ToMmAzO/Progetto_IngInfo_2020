window.onload = function () {
    initDatePicker();
    getChartData();
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

    getChartData();
    bindChangeEvent();
}

function bindChangeEvent() {
    $("#dimension").change(getChartData);
    $("#start").change(getChartData);
    $("#end").change(getChartData);
}

function getChartData() {
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
    let measurements = data['measurements']
    let labels = [];
    let values = [];

    for (let i = 0; i < measurements.length; ++i) {
        labels.push(measurements[i]['date']);
        values.push(measurements[i]['value']);
    }

    let ctx = document.getElementById('chart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: data['unit'],
                data: values,
                backgroundColor: 'rgba(0, 0, 0, 0)',
                borderColor: 'rgba(231, 111, 81, 1)',
                pointBackgroundColor: 'rgba(231, 111, 81, 1)'
            }],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {

                    }
                }],
            }
        }
    });
}

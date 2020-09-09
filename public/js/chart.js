const colors = ['#e76f51', '#264653', '#2a9d8f', '#f4a261', '#e9c46a']
let myChart = null;

window.onload = function () {
    initDatePicker();
    //initChart();
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
    console.log(data)
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

        if (data['chart'] === 'multi') {
            updateChartType('line');
            setMultiAxes();
            setData(measurements, true);
        } else if (data['chart'] === 'stacked') {
            updateChartType('bar');
            setStacked();
            setData(measurements, false);
        } else {
            updateChartType('line');
            setData(measurements, false);
        }

        myChart.data.labels = data['labels'];
        myChart.update();
    }

    function updateChartType(type) {
        if (myChart != null) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: type
        });
    }

    function setMultiAxes() {
        myChart.options.scales.yAxes = [{
            id: 'A',
            type: 'linear',
            position: 'left',
        }, {
            id: 'B',
            type: 'linear',
            position: 'right'
        }];
        myChart.options.scales.xAxes.stacked = false;
    }

    function setStacked() {
        myChart.options.scales = {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }

    function setData(measurements, multi) {
        if (multi) {
            myChart.data.datasets = [{
                label: measurements[0]['description'],
                yAxisID: 'A',
                borderColor: colors[0],
                backgroundColor: 'rgba(0,0,0,0)',
                data: measurements[0]['data']
            }, {
                label: measurements[1]['description'],
                yAxisID: 'B',
                borderColor: colors[1],
                backgroundColor: 'rgba(0,0,0,0)',
                data: measurements[1]['data']
            }];
        } else {
            measurements.forEach(function (measure, index) {
                myChart.data.datasets.push({
                    label: measure['description'],
                    data: measure['data'],
                    backgroundColor: colors[index % colors.length]
                });
            });
        }
    }
}

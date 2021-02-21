$( document ).ready(function() {
    $("#start_datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        onSelect: function(selected) {
            $("#end_datepicker").datepicker("option", "minDate", selected)
        }
    });
    $("#start_datepicker").datepicker("setDate", "-10");

    $("#end_datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        numberOfMonths: 2,
        onSelect: function(selected) {
            $("#start_datepicker").datepicker("option", "maxDate", selected)
        }
    });
    $('#end_datepicker').datepicker("setDate", "today");
});

function setDefaultPriceChart() {
    getBPIAPICall()
}

function intializePriceChart(dates, prices) {

    var ctx = $('#myChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                data: prices,
                label: "Price",
                borderColor: "#3e95cd",
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: 'BitCoin Price Chart'
            }
        }
    });

}
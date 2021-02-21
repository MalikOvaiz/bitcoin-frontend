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
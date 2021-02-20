<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bitcoin - FrontEnd</title>

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" rel="Stylesheet" type="text/css">
    <!-- Styles -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>





</head>



<body id="page-top">

    <!-- Navigation -->


    <header class="bg-primary text-white">
        <div class="container text-center">
            <h1>Welcome</h1>
            <p class="lead">Statistics for CryptoCurrency</p>
        </div>
    </header>

    <section id="about">
        <div class="container">
            <h2>Bitcoin Price Chart</h2>
            <div class="row">
                <div class="col">
                    <p>Start: <input type="text" id="start-datepicker"></p>
                </div>
                <div class="col-6">
                    <p>End: <input type="text" id="end-datepicker"></p>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary">Render</button>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </section>





    <script>
        $(document).ready(function() {
            // Handler for .ready() called.

        });
    </script>
    <script>
        $(function() {
            $("#start-datepicker").datepicker();
            $("#end-datepicker").datepicker({
                numberOfMonths: 2,
                onSelect: function(selected) {
                    $("#start-datepicker").datepicker("option", "maxDate", selected)
                }
            });
        });
    </script>

    <script>
        var ctx = $('#myChart');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
                datasets: [{
                    data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
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
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
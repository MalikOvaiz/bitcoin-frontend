<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

<body id="page-top" onload="setDefaultPriceChart()">

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
                    <p>Start: <input type="text" id="start_datepicker"></p>
                </div>
                <div class="col-6">
                    <p>End: <input type="text" id="end_datepicker"></p>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary" onclick="setDefaultPriceChart();">Render</button>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </section>

    <script>
        // We can also move this function to index.js, either need to hardcode the api_base_url(not recommended). Other way is to injext environment/global variables file as js in application
        // Skiped this due to limited time
        function getBPIAPICall() {
            var start = $.datepicker.formatDate("yy-mm-dd", $("#start_datepicker").datepicker("getDate"))
            var end = $.datepicker.formatDate("yy-mm-dd", $("#end_datepicker").datepicker("getDate"))
            if(start===end){
                alert("start date and end date should not be same, Limitation of CoinDesk API");
                return
            }
            var _token = $('meta[name="csrf-token"]').attr('content');
            var api_base_url = '{{ env('API_URL') }}';

            $.ajax({
                type: "GET",
                url: api_base_url + "coindesk/historical_bpi_data",
                datatype: 'json',
                cache: false,
                crossDomain: false,
                data: {
                    start: start,
                    end: end,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        console.log(response.bpi);
                        dates = Object.keys(response.bpi)
                        values = Object.values(response.bpi)
                        intializePriceChart(dates, values)
                    }
                },
                error: function() {
                    console.log('AJAX load did not work');
                    // Show Message to User
                    alert("Exception Handling");
                }
            });
        }
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
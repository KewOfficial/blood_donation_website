@extends('layouts.adminlte')

@section('title', 'Countdown Timer')

@section('content_header')
    <h1>Countdown Timer</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="countdown-container">
                <div id="countdown"></div>
            </div>
        </div>
    </div>
@stop

@section('styles')
    <style>
        .countdown-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        #countdown {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
@stop

@section('scripts')
    <script>
        
        var countdownDate = new Date("Oct 31, 2024 00:00:00").getTime();

        // code to update the countdown every 1 second
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countdownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

           
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            //  display a message a if the count the count is finished
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@stop

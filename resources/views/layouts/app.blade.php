<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        .navigation {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end; 
            position: relative;
          
        }

        .navigation li {
            margin-left: 20px;
        }

        .navigation a {
            text-decoration: none;
            color: #e74c3c;
            font-weight: bold;
            font-size: 18px; 
            transition: color 0.3s ease, font-size 0.3s ease; 
        }

        .navigation a:hover {
            color: #c0392b;
            transform: scale(1.1);
            font-size: 22px;
        }

    </style>

    @yield('styles')

</head>
<body>
   
    <div class="container">
        <ul class="navigation">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>

        @yield('content')
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

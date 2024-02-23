@extends('layouts.app')

@section('title', 'Home')

@section('styles')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F2F2F2;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out;
            position: relative;
            z-index: 1;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2, h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #e74c3c;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #333;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
        }

        .cta-button {
            background-color: #e74c3c;
            color: #fff;
            cursor: pointer;
            padding: 8px;
            border: none;
            border-radius: 5px;
            width: 150px;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
            margin: 0 10px;
        }

        .cta-button:hover {
            background-color: #c0392b;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* transitions and simple motion */
        #home-intro h2 {
            animation: fadeInUp 1s ease-out;
        }

        #home-intro p {
            animation: fadeInUp 1s ease-out 0.5s;
        }

        #key-features h3, #cta h3, #cta p {
            animation: fadeInUp 1s ease-out 1s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <section id="home-intro">
            <h2>Welcome to the Tanzanian Blood Donation Network</h2>
            <p>Join us in saving lives through voluntary blood donation. Every drop counts!</p>
        </section>

        <section id="key-features">
            <h3>Key Features</h3>
            <ul>
                <li>Efficient Blood Storage and Distribution</li>
                <li>Donor Loyalty Program</li>
                <li>Upcoming Events Calendar</li>
                <li>Easy Appointment Scheduling</li>
            </ul>
        </section>

        <section id="cta">
            <h3>Ready to make a difference?</h3>
            <p>Register now to become a donor or log in to your account.</p>
            <div class="cta-buttons">
                <a href="{{ route('register') }}" class="cta-button">Register</a>
                <a href="{{ route('login') }}" class="cta-button">Login</a>
            </div>
        </section>
    </div>
@endsection

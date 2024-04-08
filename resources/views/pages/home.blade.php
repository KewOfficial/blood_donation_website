@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Network</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
               background: linear-gradient(135deg, #309430, #004d00);
            color: white; 
        }
        .navigation {
            display: flex;
            justify-content:  flex-end;
            padding: 20px 0;
            background-color: #AF1831; 
        }
        .navigation a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        .navigation a:hover {
            color: #fffb00; 
        }
        .hero-section {
            display: flex;
            align-items: center;
            padding: 20px;
            overflow: hidden;
        }
        .hero-section img {
            width: 50%;
            height: auto;
            transition: transform 0.5s ease, filter 0.5s ease; 
        }
        .hero-content {
            width: 50%;
            padding: 20px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        .hero-section:hover img {
            transform: scale(1.1) rotateY(30deg); 
            filter: grayscale(50%); 
        }
        .hero-section:hover .hero-content {
            opacity: 1;
        }
        .cta-button {
            background-color: #AF1831;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            font-size: 1.2rem;
        }
        .cta-button:hover {
            background-color: #8b122b;
        }
        
        .primary-offerings, .testimonials {
            padding: 20px 0;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .offering, .testimonial {
            background-color: #4B0082; 
            width: calc(25% - 40px); 
            margin: 10px;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .offering:hover, .testimonial:hover {
            transform: translateY(-5px);
        }
        .testimonial {
            width: calc(33.333% - 40px); 
        }
        footer {
            background-color: #4B0082; 
            padding: 20px 0;
            text-align: center;
        }
        .testimonial img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .section-heading {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            transition: color 0.3s ease; 
        }
        .section-heading:hover {
            color: #fffb00; 
        }
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
            }
            .hero-section img, .hero-content {
                width: 100%;
            }
            .offering, .testimonial {
                width: 90%; 
                margin: 10px auto; 
            }
        }
    </style>
</head>
<body>

<div class="navigation">
<a href="{{ route('home') }}">Home</a>
    <a href="{{ route('about') }}">About Us</a>
    <a href="#how-it-works">How it Works</a>
    <a href="{{ route('register') }}">Register As Donor</a>
    <a href="{{ route('contact') }}">Contact Us</a>
</div>

<div class="hero-section">
    <img src="/dist/img/donate.jpg" alt="Blood Donation">
    <div class="hero-content">
        <h1>Save Lives, Donate Blood Today!</h1>
        <p>Join our community of donors and make a difference in Tanzanian healthcare.</p>
        <button class="cta-button">Register as a Donor</button>
    </div>
</div>

<h2 class="section-heading">Primary Offerings</h2>

<div class="primary-offerings">
    <div class="offering">
        <i class="fas fa-user-plus fa-3x"></i>
        <p>Quick and simple registration process to become a donor.</p>
    </div>
    <div class="offering">
        <i class="fas fa-calendar-alt fa-3x"></i>
        <p>Easily schedule appointments with blood bank managers at your convenience.</p>
    </div>
    <div class="offering">
        <i class="fas fa-gift fa-3x"></i>
        <p>Receive incentives as a token of appreciation for your life-saving contributions.</p>
    </div>
    <div class="offering">
        <i class="fas fa-chart-line fa-3x"></i>
        <p>Transparent data on blood donations, top donors, and available blood quantities.</p>
    </div>
</div>

<h2 class="section-heading">What People Are Saying</h2>

<div class="testimonials">
    <div class="testimonial">
        <img src="/dist/img/avatar.png" alt="Profile Image">
        <p>"Donating blood through the Blood Donation Network was rewarding. Making a difference in someone's life is priceless." - John</p>
    </div>
    <div class="testimonial">
        <img src="/dist/img/user3-128x128.jpg" alt="Profile Image">
        <p>"Access to real-time blood bank information greatly improves patient care. Thank you, Blood Donation Network!" - Jane Smith</p>
    </div>
    <div class="testimonial">
        <img src="/dist/img/kew.jpg" alt="Profile Image">
        <p>"Joining the Blood Donation Network has been an enriching experience. Being able to contribute to saving lives is truly fulfilling." - Kihungwe</p>
    </div>
</div>

<footer>
    <div class="social-icons">
        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
    </div>
    <p>Contact info</p>
    <p>Phone: @255742848456</p>
    <p>Email: info@blooddonationnetwork.co.tz</p>
</footer>

</body>
</html>
@endsection
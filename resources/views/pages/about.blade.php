@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Network - About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Font Awesome CDN -->
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
            justify-content: flex-end;
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
            color: #FFD700;
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

        .mission-vision,
        .impact-milestones,
        .our-story,
        .meet-the-team,
        .partnerships,
        .call-to-action {
            padding: 20px;
            text-align: center;
        }

        .mission-icon,
        .vision-icon,
        .values-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .fa-heart,
        .fa-eye,
        .fa-handshake {
            color: #AF1831;
            margin: 10px 0;
        }

        .team-member {
            border-radius: 50%;
            border: 3px solid #fff;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 10px auto;
        }

        .partner-logo {
            width: 100px;
            margin: 10px;
        }

        .call-to-action button {
            font-weight: bold;
            margin: 20px 0;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .section-heading:hover {
            color: #FFD700;
        }

        /* Footer Styles */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 40px 0;
        }

        .footer-section h4 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .footer-section p,
        .footer-section .contact-info,
        .footer-section .footer-links {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .contact-info li,
        .footer-links li {
            margin-bottom: 10px;
            list-style-type: none;
        }

        .social-icons {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons a {
            color: #fff;
            font-size: 20px;
        }

        .bottom-bar {
            background-color: #222;
            padding: 20px 0;
        }

        .bottom-bar p {
            margin-bottom: 0;
            font-size: 12px;
        }

        .footer-links li {
            display: inline;
            margin-right: 10px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="navigation">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="#how-it-works">How it Works</a>
        <a href="#register">Register As Donor</a>
        <a href="#contact">Contact Us</a>
    </div>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="/dist/img/donor.jpg" alt="Community and Support">
        <div class="hero-content">
            <h1>Empowering Tanzanian Communities Through Blood Donation</h1>
            <button class="cta-button">Learn More About Our Mission</button>
        </div>
    </div>

    <!-- Mission, Vision, and Values -->
    <div class="mission-vision">
        <div>
            <i class="fas fa-heart mission-icon"></i>
            <h2>Our Mission</h2>
            <p>The mission of the Blood Donation Network is to...</p>
        </div>
        <div>
            <i class="fas fa-eye vision-icon"></i>
            <h2>Our Vision</h2>
            <p>Our vision is to...</p>
        </div>
        <div>
            <i class="fas fa-handshake values-icon"></i>
            <h2>Our Values</h2>
            <p>At the core of our organization are values such as...</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-section">
                        <h4>Contact Information</h4>
                        <ul class="contact-info">
                            <li><i class="fas fa-phone"></i> Phone: +255742848456</li>
                            <li><i class="fas fa-envelope"></i> Email: info@blooddonationnetwork.co.tz</li>
                            <li><i class="fas fa-map-marker-alt"></i> Address: 123 Aggrey Street, Dar es salaam,
                                Tanzania</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-section">
                        <h4>Follow Us</h4>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-section">
                        <h4>Legal</h4>
                        <ul class="footer-links">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>&copy; 2024 Blood Donation Network. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
@endsection

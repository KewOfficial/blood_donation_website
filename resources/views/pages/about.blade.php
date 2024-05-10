@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Network - About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(135deg, #f2f2f2, #ffffff);
            color: #333;
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
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .hero-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #000000;
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
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            background-color: #8b122b;
        }

        .mission-vision,
        .footer {
            padding: 50px 0;
            text-align: center;
        }

        .section-heading {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #AF1831;
            transition: color 0.3s ease;
        }

        .section-heading:hover {
            color: #FFD700;
        }

        .mission-icon,
        .vision-icon,
        .values-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #AF1831;
        }

        .fa-heart,
        .fa-eye,
        .fa-handshake {
            margin: 20px 0;
        }

        .footer-section h4 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .footer-section p,
        .contact-info,
        .footer-links {
            font-size: 1rem;
            margin-bottom: 15px;
            color: #fff;
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
            font-size: 0.8rem;
            color: #fff;
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
<body>

    <div class="navigation">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="#how-it-works">How it Works</a>
        <a href="{{ route('register') }}">Register As Donor</a>
        <a href="{{ route('contact') }}">Contact Us</a>
    </div>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="/dist/img/donor.jpg" alt="Community and Support">
        <div class="hero-content">
            <h1>Empowering Tanzanian Communities Through Blood Donation</h1>
            <a href="#" class="cta-button">Learn More About Our Mission</a>
        </div>
    </div>

    <!-- Mission, Vision, and Values -->
    <div class="mission-vision">
        <h2 class="section-heading">Mission, Vision, and Values</h2>
        <div>
            <i class="fas fa-heart mission-icon"></i>
            <h3>Our Mission</h3>
            <p>The mission of the Blood Donation Network is to save lives by connecting blood donors with patients in need, ensuring a steady and reliable blood supply for medical emergencies, surgeries, and ongoing treatments. We aim to raise awareness about the importance of blood donation and foster a culture of voluntary blood donation within our community.</p>
        </div>
        <div>
            <i class="fas fa-eye vision-icon"></i>
            <h3>Our Vision</h3>
            <p>Our vision is to build a world where no patient suffers due to a lack of blood supply. We envision a future where every individual understands the critical role of blood donation in healthcare and actively participates in saving lives through regular blood donation. Through our efforts, we strive to create a sustainable blood donation ecosystem that serves the needs of patients across the globe.</p>
        </div>
        <div>
            <i class="fas fa-handshake values-icon"></i>
            <h3>Our Values</h3>
            <p>At the core of our organization are values such as compassion, integrity, collaboration, and innovation. We believe in treating every donor, patient, and stakeholder with respect and empathy, ensuring transparency and honesty in all our interactions. We embrace teamwork and partnership, recognizing that collective efforts are essential to achieving our mission. Additionally, we continuously seek innovative solutions to enhance the efficiency and effectiveness of blood donation and distribution processes.</p>
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
    </footer>

    <div class="bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 Blood Donation Network. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
@endsection
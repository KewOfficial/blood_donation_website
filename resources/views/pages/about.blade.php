@extends('layouts.app')

@section('title', 'About Us')

@section('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #2CC3D5, #3E4E50);
        font-family: 'Merriweather', sans-serif;
        color: black;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        animation: fadeIn 1s ease-out;
    }

    h2, h3 {
        font-family: 'Roboto', serif;
        font-weight: bold;
        color: #EE4019;
        margin-bottom: 10px;
        border: 2px solid #C7C4C4;
        border-radius: 10px;
        padding: 10px;
        transition: transform 0.5s ease, box-shadow 0.5s ease; /* Added box-shadow transition */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added subtle shadow effect */
    }

    h2:hover, h3:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Adjusted shadow effect on hover */
    }

    p {
        font-size: 1.2em;
        margin-bottom: 20px;
        border: 2px solid #C7C4C4;
        border-radius: 10px;
        padding: 10px;
        transition: transform 0.5s ease, box-shadow 0.5s ease; /* Added box-shadow transition */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added subtle shadow effect */
    }

    p:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Adjusted shadow effect on hover */
    }

    .statistics ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: space-around;
    }

    .statistics li {
        font-size: 1.5em;
        margin-bottom: 10px;
        text-align: center;
        transition: transform 0.5s ease, box-shadow 0.5s ease; /* Added box-shadow transition */
        border: 2px solid #C7C4C4;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added subtle shadow effect */
    }

    .statistics li:hover {
        transform: scale(1.05);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Adjusted shadow effect on hover */
    }

    .statistics li span {
        display: block;
        font-size: 1.2em;
        color: black;
    }

    .statistics li .counter {
        animation: countUp 2s ease-in-out;
    }

    .testimonials {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 20px;
        margin-top: 20px;
    }

    .testimonial {
        flex: 0 1 calc(45% - 20px);
        background-color: #BCEC0B;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        position: relative;
        margin-bottom: 20px;
    }

    .testimonial:hover {
        transform: scale(1.05);
    }

    .testimonial img {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .testimonial:hover img {
        transform: scale(1.1);
    }

    .testimonial p {
        margin-top: 60px;
        margin-bottom: 10px;
        color: black;
    }

    .testimonial span {
        display: block;
        font-style: italic;
        color: black;
    }

   
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .cta-button {
        background-color: #FA7A5D;
        color: #fff;
        cursor: pointer;
        padding: 8px 20px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.2s ease;
        margin: 0 10px;
    }

    .cta-button:hover {
        background-color: #C8644D;
        transform: scale(1.05);
    }

    html {
        scroll-behavior: smooth;
    }

    /* Bordered box */
    .about-box {
        border: 2px solid #F7F1EF;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #C7C4C4;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="about-box">
        <section id="about-intro">
            <h2>About Tanzanian Blood Donation Network</h2>
            <p>
                The Tanzanian Blood Donation Network is a leading initiative dedicated to promoting voluntary blood donation
                to ensure a steady and safe supply of blood for those in need. Our mission is to save lives and contribute to
                the well-being of the community through the selfless act of blood donation.
            </p>
        </section>

        <section id="statistics-impact">
            <div class="statistics">
                <h3>Our Impact</h3>
                <p>Since our inception, we have made a significant impact on the healthcare system and the lives of countless individuals:</p>
                <ul>
                    <li>Number of Donors: 10,000+ <span class="counter"></span></li>
                    <li>Blood Units Collected: 20,000+ <span class="counter"></span></li>
                    <li>Lives Saved: 30,000+ <span class="counter"></span></li>
                </ul>
            </div>
        </section>

        <section id="testimonials">
            <h3>What People Are Saying</h3>
            <div class="testimonials">
                <div class="testimonial">
                    <img src="{{ asset('images/jane.jpg') }}"  alt="Jane Doe Profile Image">
                    <p>"I have been a regular donor with Tanzanian Blood Donation Network, and the experience has been wonderful. It's fulfilling to know that my contribution makes a difference."</p>
                    <span>- Jane Doe, Donor</span>
                </div>

                <div class="testimonial">
                    <img src="{{ asset('images/michael.jpg') }}" alt="Michael Johnson Profile Image">
                    <p>"I never realized how easy and fulfilling it is to donate blood until I joined the Tanzanian Blood Donation Network. It's a great way to give back to the community."</p>
                    <span>- Michael Johnson, Donor</span>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

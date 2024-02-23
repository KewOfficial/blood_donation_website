@extends('layouts.app')

@section('title', 'Gallery')

@section('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #C8EAF6, #96DEC2);
        font-family: 'Merriweather', sans-serif;
        color: #333;
    }
    body {
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #FFDDD2, #FCD5CE); 
        font-family: 'Merriweather', sans-serif;
        color: #333;
    }
    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
        animation: fadeIn 1s ease-out;
    }

    #image-gallery {
        text-align: center;
    }

    h2 {
        font-family: 'Playfair Display', serif;
        color: #FA7A5D;
        margin-bottom: 10px;
    }

    p {
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: scale(1.05);
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover img {
        opacity: 0.8;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .overlay {
        opacity: 1;
    }

    .overlay p {
        margin: 0;
        font-size: 1.2em;
    }

    /* Scroll effect */
    html {
        scroll-behavior: smooth;
    }

</style>
@endsection

@section('content')
<div class="container">
    <section id="image-gallery">
        <h2>Blood Donation Gallery</h2>
        <p>Explore moments captured during our blood donation events and campaigns.</p>

        <div class="gallery">
            <div class="gallery-item">
                <img src="{{ asset('images/pic1.jpg') }}" alt="Blood Donation Event 1">
                <div class="overlay">
                    <p>Blood Donation Event 1</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('images/pic2.jpg') }}" alt="Blood Donation Event 1">
                <div class="overlay">
                    <p>Blood Donation Event 2</p>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('images/pic3.jpg') }}" alt="Blood Donation Event 1">
                <div class="overlay">
                    <p>Blood Donation Event 3</p>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

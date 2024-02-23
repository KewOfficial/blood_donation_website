@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container">
        <section id="contact-form">
            <h2>Contact Tanzanian Blood Donation Network</h2>
            <p>If you have any questions or inquiries, feel free to reach out to us. We are here to assist you!</p>

            <form action="{{ route('contact.submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="6" required></textarea>
                </div>

                <button type="submit">Send Message</button>
            </form>
        </section>

        <section id="contact-info">
            <h3>Contact Information</h3>
            <p>If you prefer other means of communication, you can reach us through the following:</p>

            <ul>
                <li>Email: <a href="mailto:info@blooddonationnetwork.com">info@blooddonationnetwork.com</a></li>
                <li>Phone: +255 123 456 789</li>
                <li>Address: 123 Blood Drive, Dar es Salaam, Tanzania</li>
            </ul>
        </section>
    </div>
@endsection

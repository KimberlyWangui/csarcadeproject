@extends('layouts.navone')
@section('title', 'Contact Us')
@section('content')
<div class="contact-container">
    <h1>CONTACT US </h1>
    <div class="contact-content">
        <div class="contact-card">
            <div class="image-slot">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Arcadia Logo" class="contact-image">
            </div>
            <div class="card-details">
                <div class="detail-group">
                    <label><i class="lni lni-phone"></i> Phone:</label>
                    <p>+254123456789</p>
                </div>
                <div class="detail-group">
                    <label><i class="lni lni-envelope"></i> Email:</label>
                    <p>info@arcadia.com</p>
                </div>
                <div class="detail-group">
                    <label><i class="lni lni-map-marker"></i> Address:</label>
                    <p>123 , Thika Road, GC 12345</p>
                </div>
                <div class="detail-group">
                    <label><i class="lni lni-clock"></i> Business Hours:</label>
                    <p>Monday - Friday: 10:00 AM - 10:00 PM<br>Saturday - Sunday: 9:00 AM - 11:00 PM</p>
                </div>
                <div class="detail-group">
                    <label>Follow Us:</label>
                    <div class="social-links">
                        <a href="https://www.facebook.com" class="social-icon"><i class="lni lni-facebook-filled"></i></a>
                        <a href="https://www.x.com" class="social-icon"><i class="lni lni-twitter-filled"></i></a>
                        <a href="https://www.instagram.com" class="social-icon"><i class="lni lni-instagram-filled"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

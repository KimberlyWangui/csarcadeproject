@extends('layouts.navone')

@section('title', 'About Us')

@section('content')
<div class="about-container">
    <h1><b>ABOUT ARCADIA</b></h1>

    <section id="overview" class="section-slide slide-right">
        <div class="section-content">
            <h2>Overview of Arcadia</h2>
            <p>Founded in 2024, Arcadia is a cutting-edge arcade ticketing system designed to revolutionize the way gaming enthusiasts experience arcades. Our platform seamlessly connects players with their favorite games, offering a hassle-free ticket purchasing experience.</p>
        </div>
        <div class="section-image">
            <img src="{{ asset('assets/images/arcade2.jpg') }}" alt="Arcade overview">
        </div>
    </section>

    <section id="mission" class="section-slide slide-left">
        <div class="section-image">
            <img src="{{ asset('assets/images/arcade3.jpg') }}" alt="Our mission">
        </div>
        <div class="section-content">
            <h2>Our Mission</h2>
            <p>At Arcadia, our mission is to provide a seamless and enjoyable ticket purchasing experience, support arcades and game enthusiasts, and foster a vibrant community around arcade gaming. We strive to make every visit to the arcade an unforgettable adventure.</p>
            <h2>Our Vision</h2>
            <p>We aspire to become the leading platform for arcade ticket sales and game discovery worldwide. Our long-term goal is to revolutionize the arcade experience through innovative technology, creating a global network of connected arcades and players.</p>
        </div>
    </section>

    <section id="services" class="section-slide slide-right">
        <div class="section-content">
            <h2>Services Offered</h2>
            <ul>
                <li>
                    <h3>Ticket Purchasing</h3>
                    <p>Easily purchase tickets for a wide variety of arcade games. We offer flexible options including single tickets, child and adult packages, and family bundles to suit every need.</p>
                </li>
                <li>
                    <h3>Game Selection</h3>
                    <p>Discover an extensive range of games, from classic favorites to the latest cutting-edge experiences. Our platform showcases unique and popular games that set us apart from traditional arcades.</p>
                </li>
                <li>
                    <h3>Promotions and Discounts</h3>
                    <p>Enjoy regular special offers, promotional codes, and discounts. Keep an eye out for seasonal events and loyalty rewards to maximize your arcade experience.</p>
                </li>
            </ul>
        </div>
        <div class="section-image">
            <img src="{{ asset('assets/images/arcade4.jpg') }}" alt="Our vision">
        </div>
    </section>

    <section id="Support" class="section-slide slide-left">
        <div class="section-image">
            <img src="{{ asset('assets/images/arcade5.jpg') }}" alt="Our services">
        </div>
        <div class="section-content">
            <h2>Customer Support</h2>
            <ul>
                <li>
                    <h3>Assistance and Support</h3>
                    <p>Our dedicated support team is always ready to help. Check out our comprehensive FAQ section, or reach out to our helpdesk for personalized assistance.</p>
                </li>
                <li>
                    <h3>Feedback and Improvement</h3>
                    <p>We value your input! Help us improve by sharing your thoughts and suggestions. Your feedback directly shapes the future of Arcadia.</p>
                </li>
            </ul>
        
        </div>
    </section>

    

  

    <section id="call-to-action" >
        <div class="section-content full-width">
            <h2>Join the Arcadia Community</h2>
            <p>Ready to elevate your arcade experience?
                 Join Arcadia today and become part of our growing community of passionate gamers!</p>
            <a href="/register" class="cta-button">Sign Up Now</a>
           
        </div>
    </section>
</div>
@endsection
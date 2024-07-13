@extends('layouts.navone')

@section('title', 'FAQ')

@section('content')
<div class="row mt-3"></div>
<div class="faq-container">
    <h1>Frequently Asked Questions</h1>
    <div class="faq-list">
        <div class="faq-item">
            <button class="faq-question">What are your opening hours?</button>
            <div class="faq-answer">
                <p>We are open from 10 AM to 10 PM, seven days a week.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">How can I purchase Tickets?</button>
            <div class="faq-answer">
                <p>To purchase tickets, please click the Book Now in the footer or the 
                    get tickets in the home page
                </p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Is there an age limit for the arcade?</button>
            <div class="faq-answer">
                <p>There is no strict age limit, but children under 12 must be accompanied by an adult.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Can I purchase tickets in advance?</button>
            <div class="faq-answer">
                <p>Yes, you can purchase tickets in advance for upcoming events.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">What type of games are available?</button>
            <div class="faq-answer">
                <p>We have a variety of pixel games like mario and modern games like Tekken, 
                    you can check the games link for more.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">Can I purchase tickets in advance?</button>
            <div class="faq-answer">
                <p>Yes, you can purchase tickets in advance for upcoming events.</p>
            </div>
        </div> <div class="faq-item">
            <button class="faq-question">Do I need an account to purchase tickets?</button>
            <div class="faq-answer">
                <p>No, you can purchase as a guest but having an account has it's advantages.</p>
            </div>
        </div> <div class="faq-item">
            <button class="faq-question">How can I view my ticket history?</button>
            <div class="faq-answer">
                <p>You can find your ticket history on your user dashboard.</p>
            </div>
        </div>
    </div>
</div>
@endsection



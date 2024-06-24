<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia</title>



    <!-- CSS links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/LineIcons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.1.0/glightbox.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
</head>

<body>
    <!-- Preloader, used to define the animations -->
    <div class="preloader">
      <div class="preloader-inner">
        <div class="preloader-icon">
          <span></span>
          <span></span>
        </div>
      </div>
    </div>

    <!--Header code -->
    <header class="header navbar-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="nav-inner"></div>

    <!-- Navbar code -->
    <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="index.html">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" />

  <!-- Button responsiveness on mobile -->
  
  <button
  class="navbar-toggler mobile-menu-btn"
  type="button"
  data-bs-toggle="collapse"
  data-bs-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent"
  aria-expanded="false"
  aria-label="Toggle navigation">

  <span class="toggler-icon"></span>
  <span class="toggler-icon"></span>
  <span class="toggler-icon"></span>
</button>


<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">

<ul id="nav" class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="page-scroll" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="faq.php">FAQs</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="contacts.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="/register">Sign Up</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="/login">Sign In</a>
                    </li>
                  </ul>
                </div>

                <!-- navbar collapse -->

                <div class="button">
                  <a href="{{ route('buy.tickets') }}" class="btn">Get Tickets <i class="lni lni-ticket"></i></a>
                  <!-- use of line icons for the ticket icon-->
                </div>

    </nav>
     <!-- End of Navbar -->
     </div>
          </div>
        </div>
        </div>
        </header>

  <!-- End of Header -->

  <!-- Start Hero Area -->
  <section class="hero-area">


  

  <video autoplay muted loop class="video-background">
    <source src="{{ asset('assets/images/csproject1.mp4') }}" type="video/mp4">
  </video>

  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 offset-lg-3 col-md-12 col-12"></div>
      <div class="hero-content">
      <h4 >
      <i class="lni lni-map-marker"></i> Arcadia
              </h4>
              
              <h3> 
              Welcome to Arcadia, where every ticket unlocks endless arcade excitement.
              
              <br>

              Join us for unforgettable adventures!!!
              </h3> 
              <div class="button">
  <a href="#learnmore" class="btn1">Learn More</a>
  <a href="buytickets.php" class="btn1">Buy Ticket Now</a>
</div>
          </div>
        </div>
      </div>
     
    </section>

    <!-- End Hero Area -->

    <!-- Start Features Area -->
    <section class="features section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
            
            <h2>
                <b>What games do we offer?</b>
              </h2>

              <p >Here's a sneak peak of the games offered at the arcade!</p>
            </div>
          </div>
        </div>
        <div class="row">
        <div
            class="col-lg-4 col-md-6 col-12 ">
       
       


  
    <!-- Start Single Feature -->
    <div class="single-feature">
   
      <div class="video-container">
        <video autoplay muted loop class="video-background1" onmouseenter="this.play()" onmouseleave="this.pause()">
          <source src="{{ asset('assets/images/streetfight.mp4')}}" type="video/mp4">
        </video>
      
      </div>
      
      <span class="serial"><b>01</b></span>
      <h3><b>STREET FIGHTER II</b> 
    </h3>
    
    <h5>Iconic arcade game featuring diverse fighters engaging in intense battles with unique special moves and combos.
    </h5>
   
    </div>
    <!-- End Single Feature -->
  </div>

  <div class="col-lg-4 col-md-6 col-12 wow fadeInUp">
    <!-- Start Single Feature -->
    <div class="single-feature">
      <div class="video-container">
        <video autoplay muted loop class="video-background1" onmouseenter="this.play()" onmouseleave="this.pause()">
          <source src="{{ asset('assets/images/apex.mp4')}}" type="video/mp4">
        </video>
      </div>
      <span class="serial"><b>02</b></span>
      <h3><b>APEX RACING</b></h3>

      <h5>Intense multiplayer racing game with diverse tracks, customizable cars, and thrilling competition against players worldwide for victory.</h5>
    </div>
    <!-- End Single Feature -->
  </div>

  <div class="col-lg-4 col-md-6 col-12 wow fadeInUp">
    <!-- Start Single Feature -->
    <div class="single-feature">
      <div class="video-container">
        <video autoplay muted loop class="video-background1" onmouseenter="this.play()" onmouseleave="this.pause()">
          <source src="{{asset('assets/images/mortal.mp4')}}" type="video/mp4">
        </video>
      </div>
      <span class="serial"><b>03</b></span>
      <h3><b>MORTAL KOMBAT</b></h3>
      <h5>Iconic fighting game series: brutal battles, diverse characters, signature fatalities, intense combos, competitive multiplayer, legendary status in gaming culture.</h5>
    </div>
    <!-- End Single Feature -->
  </div>
</div>

<div class="container1">
    <div class="button">
      <a href="#learnmore" class="btn2">See More</a>
    </div>
    </div>           
          <!-- End features Section-->

           
     <!-- Start Offers Area -->

     <section class="features section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
             <h2><b>OFFERS AND DISCOUNTS</b></h2>
             
              <p>
                Below are the current available offers by the arcade.
              </p>
              </div>
          </div>
        </div>
        <div class="row">
          <div
            class="col-lg-4 col-md-6 col-12"
            
          >
          <!-- Start Single Feature -->
    <div class="single-feature1">
   
   <div class="video-container">
     <video autoplay muted loop class="video-background2" onmouseenter="this.play()" onmouseleave="this.pause()">
       <source src="{{asset('assets/images/arcading.mp4')}}" type="video/mp4">
     </video>
   
   </div>
   
   <span class="serial"><b>01</b></span>
   <h3><b>UNLIMITED PLAY PASS</b> 
 </h3>
 
 <h5>Enjoy endless gaming fun from 8 to 5 at a fair price with our <b>UNLIMITED</b> Play Pass. Applicable only for children 
  under the age of 12.
 </h5>

 </div>
 <!-- End Single Feature -->
</div>

<div class="col-lg-4 col-md-6 col-12 wow fadeInUp">
 <!-- Start Single Feature -->
 <div class="single-feature1">
   <div class="video-container">
     <video autoplay muted loop class="video-background2" onmouseenter="this.play()" onmouseleave="this.pause()">
       <source src="{{asset('assets/images/loyalty.mp4')}}" type="video/mp4">
     </video>
   </div>
   <span class="serial"><b>02</b></span>
   <h3><b>LOYALTY PROGRAM</b></h3>

   <h5>Stand a chance to win points or rewards for every visit or money spent. Redeem at the cashier.</h5>
 </div>
 <!-- End Single Feature -->
</div>

<div class="col-lg-4 col-md-6 col-12 wow fadeInUp">
 <!-- Start Single Feature -->
 <div class="single-feature1">
   <div class="video-container">
     <video autoplay muted loop class="video-background2" onmouseenter="this.play()" onmouseleave="this.pause()">
       <source src="{{asset('assets/images/special event.mp4')}}" type="video/mp4">
     </video>
   </div>
   <span class="serial"><b>03</b></span>
   <h3><b>SPECIAL EVENT PROMO</b></h3>
   <h5>Half price during gaming concerts and holidays.You can also get a package 
     deal of unlimited games and a snack combo! </h5>
 </div>
 <!-- End Single Feature -->
</div>
</div>

<div class="container2">
 <div class="button">
   <a href="#learnmore" class="btn3">See More</a>
 </div>
 </div>           
          
          

          <!-- End Offers Section-->

         <!-- Start Testimonial Section -->
         <section id="testimonials" class="testimonials">
  <div class="section-title">
    <h2><b>Testimonials</b></h2>
    <p>Here's what the customers have to say about us!</p>
  </div>
  <div class="row">
    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
      <!-- Start Single Feature -->
      <div class="single-feature3 testimonial-card">
        <img class="testimonial-img" src="{{asset('assets/images/stock1.jpg')}}" alt="Customer one" />
        <div class="iconz">
          <i class="lni lni-popup"></i>
        </div>
        <h3>Marie Pickins</h3>
        <p>"Today was actually so fun, especially the mario karts and just dance. Most definitely coming back again."</p>
      </div>
      <!-- End Single Feature -->
    </div>
    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".4s">
      <!-- Start Single Feature -->
      <div class="single-feature3 testimonial-card">
      <img class="testimonial-img" src="{{asset('assets/images/stock2.jpg')}}" alt="Customer one" />
        <div class="iconz">
          <i class="lni lni-popup"></i>
        </div>
        <h3>Zumaridi Tembo</h3>
        <p>"Today was such a steal. I can't believe I won a free meal cause I came back again.
          Count me in as a regular!"</p>
      </div>
      <!-- End Single Feature -->
    </div>
    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".6s">
      <!-- Start Single Feature -->
      <div class="single-feature3 testimonial-card">
      <img class="testimonial-img" src="{{asset('assets/images/stock3.jpg')}}" alt="Customer one" />
        <div class="iconz">
          <i class="lni lni-popup"></i>
        </div>
        <h3>Ricky Zakia</h3>
        <p>Spent a day here. Brought back so many memories, I felt 8 again. Good service from the staff
          too.
        </p>
      </div>
      <!-- End Single Feature -->
    </div>
  </div>
</section>
<!-- End Testimonial Section -->
      

     
<!-- Start Footer Section -->
<footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
      <div class="container">
        <div class="inner-content">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer f-about">
                <div class="logo1">
                  <a href="index.html">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Arcade Logo" />
                  </a>
                </div>
               
                <span class="social-title">Find Us On:</span>
                <ul class="social">
                  <li>
                    <a href="#"><i class="lni lni-facebook-filled"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lni lni-twitter-filled"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="lni lni-instagram-filled"></i></a>
                  </li>
                </ul>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-2 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer f-link">
                <h3>Quick Links</h3>
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">FAQs</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Terms and Conditions</a></li>
                  <li><a href="#">Sign Up</a></li>
                </ul>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="single-footer newsletter">
                <h3>Subscribe to our newsletter</h3>
                <form action="#" method="get" target="_blank" class="newsletter-form">
                  <input name="name" placeholder="Your Name*" required type="text" />
                  <input name="email" placeholder="Email address*" required type="email" />
                  <div class="button">
                    <button class="btn">Subscribe</button>
                  </div>
                </form>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-2 col-md-6 col-12">
              <h4>Book Now</h4>
              <a href="tickets.php" class="btn4">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Footer Top -->

    <!-- Start Copyright Area -->
    <div class="copyright">
      <div class="container">
        <div class="inner-content">
          <div class="row">
            <div class="col-12">
              <p class="copyright-text">Designed and Developed by Shawntel and Kimberly.co</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Copyright Area -->
  </footer>
  <!--End Footer Section -->
 

  <!--Scroll to top -->

  <a href="#" class="scroll-top btn-hover">
      <i class="lni lni-chevron-up"></i>
    </a>

<!--JS Links-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="{{ asset('assets/index.js')}}"></script>

</body>
</html>
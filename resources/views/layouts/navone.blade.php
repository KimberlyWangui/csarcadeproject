<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.lineicons.com/3.0/LineIcons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.1.0/glightbox.min.css" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/FAQ.css')}}" />
</head>
<body>
      <!--Header code -->
      <header class="header navbar-area" style="background-color: #EC3B83 ;">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <div class="nav-inner"></div>
  
      <!-- Navbar code -->
      <nav class="navbar navbar-expand-lg" style="background-color: #EC3B83;">
        <div class="container">
         
          
          <a class="navbar-brand" href="index.php">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" />
          </a>
        
      
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
                <a class="page-scroll" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="page-scroll" href="/FAQ">FAQs</a>
              </li>
              <li class="nav-item">
                <a class="page-scroll" href="/contact">Contact Us</a>
              </li>
              <?php if(!auth()->check()): ?>
                <li class="nav-item">
                  <a class="page-scroll" href="/register">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a class="page-scroll" href="/login">Sign In</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="page-scroll" href="<?php echo route('logout'); ?>"
                     onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Sign Out
                  </a>
                </li>
                <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
                </form>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
       <!-- End of Navbar -->
    
       </div>
            </div>
          </div>
          </div>
          </header>
  
        

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
          <div class="container">
            <div class="inner-content">
              <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                  <!-- Single Widget -->
                  <div class="single-footer f-about">
                    <div class="logo1">
                      <a href="index.php">
                        <img src="{{asset('assets/images/logo.png')}}" alt="Arcade Logo" />
                      </a>
                    </div>
                    <span class="social-title">Find Us On:</span>
                    <ul class="social">
                      <li>
                        <a href="https://www.facebook.com"><i class="lni lni-facebook-filled"></i></a>
                      </li>
                      
                      
                      <li>
                        <a href="https://www.x.com"><i class="lni lni-twitter-filled"></i></a>
                      </li>
                      <li>
                        <a href="https://www.instagram.com"><i class="lni lni-instagram-filled"></i></a>
                      </li>
                    </ul>
                    
      
                  </div>
                  <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                  <!-- Single Widget -->
                  <div class="single-footer f-link">
                    
                    <h3>QUICK LINKS: </h3>
                    <ul>
                      <li><a href="/about">About Us</a></li>
                      <li><a href="/FAQ">FAQs</a></li>
                      <li><a href="/contact">Contact Us</a></li>
                      <li><a href="/register">Sign Up</a></li>
                    </ul>
                  </div>
                  <!-- End Single Widget -->
                </div>
                
                <div class="col-lg-3 col-md-6 col-12">
                 
                  
                  <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                  <i class="lni lni-game"></i>
                  <h4>Book Now</h4>
                  <a href="{{ route('buy.tickets') }}" class="btn4">Book Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      
       
      </footer>
    <script src="{{ asset('assets/js/about.js') }}"></script>
    <script src="{{ asset('assets/js/FAQ.js') }}"></script>
</body>
</html>
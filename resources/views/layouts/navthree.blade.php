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
    <link href="{{ asset('assets/css/tickets.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/games.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/cart.css') }}" rel="stylesheet">
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
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni lni-cogs"></i>
<?php echo auth()->user()->name; ?>
</a>
<div class="dropdown-menu" aria-labelledby="userDropdown">
<a class="dropdown-item" href="/dashboard">Dashboard</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="<?php echo route('logout'); ?>"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
Sign Out
</a>
</div>
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

    
    <script src="{{ asset('assets/js/tickets.js') }}"></script>
    <script src="{{ asset('assets/js/games.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
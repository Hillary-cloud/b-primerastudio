<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>b-primera</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    {{-- <link href="assets/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> --}}

    <!-- Bootstrap CSS File -->
    <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    {{-- <link rel="stylesheet" href="build/assets/app.b00e971d.css"> --}}
    <link href="assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    {{-- <link href="assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet"> --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="background-color: black; margin: 0; padding: 0;">

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
        <a class="navbar-brand" href="{{route('/')}}">
            <img src="{{asset("assets/img/B' Primera Studios LOGO2.jpg")}}" width="100px" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto mb-2">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{route('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{route('about')}}">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gallery
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                {{-- <a class="dropdown-item" href="#"><i class="fa fa-tachometer"> </i>Video</a> --}}
                <a class="dropdown-item" href="{{route('all-photos')}}"><i class="fa fa-image"></i> Photo</a>
              </div>
            </li>

            @if (Route::has('login'))
            @auth
                @if (Auth::user()->user_type === 'ADM')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Account ({{Auth::user()->name}})
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('admin.categories')}}"><i class="fa fa-tachometer"></i> Category</a>
                        <a class="dropdown-item" href="{{route('admin.photos')}}"><i class="fa fa-image"></i> Photo</a>
                        <a class="dropdown-item" href="{{route('admin.collages')}}"><i class="fa fa-camera"></i> Collage</a><hr>
                        <i class="fa fa-sign-out"></i> <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Log Out') }}
                                                </a>
                                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                    @csrf
                        
                                                </form>
                    </div>
                  </li>
                @endif
            @endauth
        @endif  
          </ul>
        </div>
    </div>
      </nav>

    @yield('content')
    
    <div class="whatsapp-chat">
        <a href="https://wa.me/+2348122232325?text=I'm%20interested%20in%20your%20service" target="_blank">
            <img src="{{ asset('assets/img/whatsapp.png') }}" width="60px" height="60px" class="m-2"
                alt="">
        </a>
    </div>

    <div class="footer py-5 text-light" style="background-color: black" data-aos="flip-up"
    data-aos-duration="2000">
    <div class="card" style="background-color: black">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4 class="mt-3" style="color: rgb(175, 146,
                            73);"><strong>B'PRIMERA STUDIO</strong></h4><hr>
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Ut fugit nisi adipisci
                        exercitationem magni veniam asperiores quae
                        dolorum doloribus impedit esse, officiis
                        deserunt, repellat mollitia quo optio quos cum
                        debitis?
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4 class="mt-3"><strong>Services</strong></h4><hr>
                        <p><i class="fa fa-camera"></i> Photography</p>
                        <p><i class="fa fa-video-camera"></i>
                            Videography</p>
                        <p><i class="fa fa-camera"></i> Event Coverage</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4 class="mt-3"><strong>Links</strong></h4><hr>
                        <a href="{{route('/')}}" style="text-decoration: none; color:
                            white;"><i class="fa fa-angle-double-right"></i>
                            Home</a><br><br>
                        <a href="{{route('about')}}" style="text-decoration: none; color:
                            white;"><i class="fa fa-angle-double-right"></i>
                            About</a><br><br>
                        <a href="{{route('all-photos')}}" style="text-decoration: none; color:
                            white;"><i class="fa fa-angle-double-right"></i>
                            Photo</a><br><br>
                        {{-- <a href="" style="text-decoration: none; color:
                            white;"><i class="fa fa-angle-double-right"></i>
                            Video</a><br> --}}
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4 class="mt-3"><strong>Contacts</strong></h4><hr>
                        <p><i class="fa fa-home"></i> No 15, Akpoga
                            Plaza, Obollo-Afor</p>
                        <p><i class="fa fa-envelope"></i>
                            b'primera@gmail.com</p>
                        <p><i class="fa fa-phone"></i> +234 8122232325</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="socials d-flex mt-4 ml-auto mr-auto">
            <a href="" class="ml-3 mr-3" target="_blank"><ion-icon
                    name="logo-facebook"></ion-icon> </a><br>
            <a href="" class="ml-3 mr-3" target="_blank"><ion-icon
                    name="logo-twitter"></ion-icon> </a><br>
            <a href="" class="ml-3 mr-3" target="_blank"><ion-icon
                    name="logo-instagram"></ion-icon> </a><br>
        </div>
    </div>
</div>
<div class="copyright p-3 text-center">
    &copy; 2022 Copyright: <span class="copyright-b">B'Primerastudio.com</span>
</div>
<div onclick="scrollToTop()" class="back-to-top">Top</div>
    
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/jquery/jquery-migrate.min.js"></script>
    <script src="assets/lib/popper/popper.min.js"></script>
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="assets/contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    
    <script>
        function scrollToTop(){
window.scrollTo(0,0);
}
   </script>
   <script>
    $('.property-carousel').owlCarousel({
           loop:true,
           margin:10,
           nav:true,
           responsive:{
               0:{
                   items:1
               },
               600:{
                   items:3
               },
               1000:{
                   items:3
               }
           }
       })
      
              </script>
                <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <script>
                    AOS.init();
                  </script>

</body>

</html>

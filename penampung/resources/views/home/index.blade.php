<!DOCTYPE html>
<!-- saved from url=(0043)https://colorlib.com/preview/theme/imagine/ -->
<html lang="en">
  <head>
    <title>Digidana</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
    <link href="{{ asset('dist/css/digidana.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style(1).css') }}">
    <link rel="icon" href="{{ asset('dist/img/logo-simbol.png') }}">

    <!-- PWA --> 
    <link rel="manifest" href="manifest.json">
  </head>


  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">
    <div id="overlayer" style="display: none;"></div>

    <div class="loader" style="display: none;">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="site-wrap" id="home-section">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>


        <div class="site-mobile-menu-body">
          <ul class="site-nav-wrap">
            <li><a href="#home-section" class="nav-link active">Home</a></li>
            <li><a href="#features-section" class="nav-link">Technology</a></li>
            <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse" data-target="#collapseItem0"></span>
              <a href="#about-section" class="nav-link">About Us</a>
              <ul class="collapse" id="collapseItem0">
                  <li><a href="#" target="_blank" class="nav-link"><span class="text-primary">More Free Templates</span></a></li>
                  <li><a href="#our-team-section" class="nav-link">Our Team</a></li>
                  <li class="has-children"><span class="arrow-collapse collapsed" data-toggle="collapse" data-target="#collapseItem1"></span>
                  <a href="#">More Links</a>
                  <ul class="collapse" id="collapseItem1">  
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                  </ul> 
                </li>   
              </ul>
            </li>
            <li><a href="https://colorlib.com/preview/theme/imagine/#testimonials-section" class="nav-link">Testimonials</a></li>
            <li><a href="https://colorlib.com/preview/theme/imagine/#blog-section" class="nav-link">Blog</a></li>
            <li><a href="https://colorlib.com/preview/theme/imagine/#contact-section" class="nav-link">Contact</a></li>
          </ul>
        </div>  
      </div>

      <div id="sticky-wrapper" class="sticky-wrapper" style="height: 78.0625px;">
        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner" style="width: 1349px;">
          <div class="container">
            <div class="row align-items-center">  
              <div class="col-6 col-md-3 col-xl-4 d-block">
                <h1 class="mb-0 site-logo"><a href="https://colorlib.com/preview/theme/imagine/index.html" class="text-black h2 mb-0"><img src="{{ asset('dist/img/logo.png') }}" style="width: 50%; height: 50%;" alt=""></a></h1>
              </div>
              <div class="col-12 col-md-9 col-xl-8 main-menu">
                <nav class="site-navigation position-relative text-right" role="navigation">
                  <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li><a href="{{ route('home.category', 'self-improvement') }}" <?php echo Request()->params == "self-improvement" ? "class='nav-link active'" : "class='nav-link'"; ?> >Self Improvement</a></li>
                    <li><a href="{{ route('home.category', 'technology') }}" <?php echo Request()->params == "technology" ? "class='nav-link active'" : "class='nav-link'"; ?> >Technology</a></li>
                    <li><a href="{{ route('home.category', 'humaniora') }}" <?php echo Request()->params == "humaniora" ? "class='nav-link active'" : "class='nav-link'"; ?> >Humaniora</a></li>
                    @if(Auth::check())
                      <li><a href="{{ route('dashboard.index') }}" class="nav-link">{{ Auth::user()->first_name }}</a></li>
                    @else
                      <li><a href="#" data-toggle="modal" data-target="#login" class="nav-link">Login</a></li>
                    @endif
                    <!-- <li class="has-children">
                      <a href="https://colorlib.com/preview/theme/imagine/#about-section" class="nav-link">Technology</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="https://colorlib.com/preview/theme/imagine/#" target="_blank" class="nav-link"><span class="text-primary">More Free Templates</span></a></li>
                          <li><a href="https://colorlib.com/preview/theme/imagine/#our-team-section" class="nav-link">Our Team</a></li>
                          <li class="has-children">
                            <a href="https://colorlib.com/preview/theme/imagine/#">More Links</a>
                              <ul class="dropdown">
                                <li><a href="https://colorlib.com/preview/theme/imagine/#">Menu One</a></li>
                                <li><a href="https://colorlib.com/preview/theme/imagine/#">Menu Two</a></li>
                                <li><a href="https://colorlib.com/preview/theme/imagine/#">Menu Three</a></li>
                              </ul>
                          </li>
                        </ul>
                    </li> -->
                    <!-- <li><a href="https://colorlib.com/preview/theme/imagine/#blog-section" class="nav-link">Blog</a></li>
                    <li><a href="https://colorlib.com/preview/theme/imagine/#contact-section" class="nav-link">Contact</a></li> -->
                  </ul>
                </nav>
              </div>
              <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0"><a href="https://colorlib.com/preview/theme/imagine/#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>
            </div>
          </div>
        </header>
      </div>

      
      @if(Route::currentRouteName() == "home.index")
        <div class="site-blocks-cover" style="overflow: hidden;">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 aos-init aos-animate" style="position: relative;" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ $headline->cover_post }}" alt="Image" class="img-fluid img-absolute">
                  <div class="row mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-6 mr-auto">
                      <h1><a href="{{ route('home.detail-article', $headline->id_post) }}" style="color: #000;">{{ $headline->title_preview_post }}</a></h1>
                      <!-- <h1>Make Impact For Others Peoples</h1> -->
                      <!-- <p class="mb-5">With Digital You are can contribute for better world</p> -->
                    <div>
                    <!-- <a href="https://colorlib.com/preview/theme/imagine/#" class="btn btn-primary mr-2 mb-2">Get Started</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>

    @yield('content')

  </div> 
  <div class="footer text-center">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <img src="{{ asset('dist/img/logo.png') }}" style="width: 200px;margin-bottom: 40px;" alt="">
        </div>
        <hr>
        <div class="col-md-5 mx-auto text-center">
          <form action="{{ route('subscriber.save.front') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="">Dapatkan Info Update Dari Post Terbaru Kami</label>
              <input type="email" class="form-control" name="email" placeholder="Insert Email...." style="border-radius:0;">
            </div>
            <div class="form-group">
              <button class="btn btn-primary" style="border-radius: 0;"><i class="fa fa-facebook"></i> Subscribe</button>
            </div>
          </form>
         
        </div>
        <div class="col-12">
          <p class="mb-0">
            <a href="#" class="p-3"><span class="icon-facebook"></span></a>
            <a href="#" class="p-3"><span class="icon-twitter"></span></a>
            <a href="#" class="p-3"><span class="icon-instagram"></span></a>
            <a href="#" class="p-3"><span class="icon-linkedin"></span></a>
            <a href="#" class="p-3"><span class="icon-pinterest"></span></a>
          </p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <p class="mb-0">&copy 2020 Digidana.id All rights reserved | This template is made with by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
        </div>
      </div>
    </div>
  </div>

  <!--Login --> 
  <div class="modal fade" id="login">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-heading"></div>
              <div class="modal-body">
                  <div class="container">
                      <form style="padding: 30px;" method="POST" action="{{ route('account.post.login') }}">
                          {{ csrf_field() }}
                          <div class="card" style="border: none;">
                              <div class="card-body">
                                  <a href="" class="brand text-center d-block m-b-20">
                                      <img src="{{ asset('dist/img/logo.png') }}" style="width: 50%; height: 30%"/>
                                  </a>
                                  <h5 class="sign-in-heading text-center m-b-20">Sign in to your account</h5>
                                  <div class="form-group">
                                      <label for="inputEmail" class="sr-only">Email address</label>
                                      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="">
                                  </div>

                                  <div class="form-group">
                                      <label for="inputPassword" class="sr-only">Password</label>
                                      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
                                  </div>
                                  
                                  <button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign In</button><br><br>
                                  <p class="text-muted m-t-25 m-b-0 p-0">Don't have an account yet?<a href="{{ route('admin.register') }}"> Create an account</a></p>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

<!-- <script src="{{ asset('dist/js/jquery-3.3.1.min.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('dist/js/jquery-ui.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('dist/js/popper.min.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/jquery.countdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/jquery.easing.1.3.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/aos.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/jquery.fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/jquery.sticky.js') }}" type="text/javascript"></script>
<script src="{{ asset('dist/js/main.js') }}" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script async="" src="{{ asset('dist/js/digidana.js') }}" type="text/javascript"></script>

<!-- PWA --> 
<script src="{{ asset('js/pwa/main.js') }}"></script>

<script type="text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body></html>
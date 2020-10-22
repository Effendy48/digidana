
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Digidana | Sign In</title>
        <!-- ================== GOOGLE FONTS ==================-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
        <!-- ======================= GLOBAL VENDOR STYLES ========================-->
        <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/metisMenu.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/jquery.mCustomScrollbar.css') }}">
        <!-- ======================= LINE AWESOME ICONS ===========================-->
        <link rel="stylesheet" href="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/css/icons/line-awesome.min.css">
        <!-- ======================= DRIP ICONS ===================================-->
        <link rel="stylesheet" href="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/css/icons/dripicons.min.css">
        <!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
        <link rel="stylesheet" href="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/css/icons/material-design-iconic-font.min.css">
        <!-- ======================= GLOBAL COMMON STYLES ============================-->
        <link rel="stylesheet" href="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/css/common/main.bundle.css">
        <!-- ======================= LAYOUT TYPE ===========================-->
        <link rel="stylesheet" href="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/css/layouts/vertical/core/main.css">
        <!-- ======================= MENU TYPE ===========================================-->
        <link rel="stylesheet" href="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/css/layouts/vertical/menu-type/default.css">
        <!-- ======================= THEME COLOR STYLES ===========================-->
        <link rel="stylesheet" href="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/css/layouts/vertical/themes/theme-j.css">
    </head>

    <body style="background: #fff;">
        <div class="container">
            <form class="sign-in-form" action="">
                <div class="card">
                    <div class="card-body">
                        <a href="" class="brand text-center d-block m-b-20">
                            <img src="{{ asset('dist/img/logo.png') }}" style="width: 50%; height: 30%"/>
                        </a>
                        <h5 class="sign-in-heading text-center m-b-20">Created your account</h5>

                        <div class="form-group">
                            <label for="inputEmail" class="sr-only">Your Name</label>
                            <input type="text" id="inputName" class="form-control" placeholder="Your Name" required="">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="">
                        </div>


                        <div class="form-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                        </div>
                        
                        <button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign Up</button>
                        <!-- <p class="text-muted m-t-25 m-b-0 p-0">Don't have an account yet?<a href="auth.register.html"> Create an account</a></p> -->
                    </div>

                </div>
            </form>
        </div>

        <!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/modernizr/modernizr.custom.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/js-storage/js.storage.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/js-cookie/src/js.cookie.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/pace/pace.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/metismenu/dist/metisMenu.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/switchery-npm/index.js"></script>
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- ================== GLOBAL APP SCRIPTS ==================-->
        <script src="http://www.authenticgoods.co/themes/quantum-pro/demos/assets/js/global/app.js"></script>

    </body>

</html>

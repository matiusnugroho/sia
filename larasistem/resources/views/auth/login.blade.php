<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->



    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SIAStar Log in</title>
        <link rel="icon" type="image/png" href="assets/images/favicon.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/animate.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="assets/js/vendor/animsition/css/animsition.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="assets/css/main.css">
        <!--/ stylesheets -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        
        <!--/ modernizr -->




    </head>





    <body id="minovate" class="appWrapper">






        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->












        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">




            <div class="page page-core">

                
                <div class="text-center"><img class="logoimg" src="{{url('/img/smanpin.png')}}"><h3 class="text-light text-white"><span class="text-lightred">SIA</span>STAR</h3></div>

                <div class="container w-420 p-15 bg-white mt-40 text-center">
                    <form name="form" class="form-validation mt-20" novalidate="" method="post" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                        <div class="form-group">
                            {!! Form::text('username', old('username'), ['class' => 'form-control underline-input', 'placeholder' => 'username']) !!}
                             @if ($errors->has('username'))
                        <span class="help-block text-red">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    
                        </div>

                        <div class="form-group">
                            {!!Form::password('password',['class' => 'form-control underline-input', 'placeholder' => 'pasword']) !!}
                            @if ($errors->has('password'))
                        <span class="help-block text-red">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    
                        </div>

                        <div class="form-group text-right mt-20">
                            <button type="submit" class="btn btn-greensea b-0 br-2 mr-5">Login</button>
                            <a href="{{url('/lupa-password')}}" class="pull-left mt-10">Lupa password?</a>
                        </div>

                    </form>

                    <hr class="b-3x">

                    <div class="bg-slategray lt wrap-reset mt-40">
                        <p class="m-0">
                            Dibuat dengan <span class="text-red">&#10084</span> oleh <a href="http://instagram.com/matiusnugroho">@matiusnugroho</a>
                        </p>
                    </div>

                </div>

            </div>



        </div>
        <!--/ Application Content -->














        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="assets/js/main.js"></script>
        <!--/ custom javascripts -->






        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        
    </body>
</html>

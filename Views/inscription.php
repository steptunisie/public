

        <html lang="en">
            <head>
                <meta charset="utf-8" >
                <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Makook Annonces</title>

                <!-- Favicon -->
                <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
                <link rel="shortcut icon" href="assets/ico/favicon.ico">

                <!-- CSS Global -->
                <link href="<?php echo ROOT ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <!--link href="assets/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet"-->
                <link href="<?php echo ROOT ?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/plugins/animate/animate.min.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/plugins/swiper/css/swiper.min.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/css/bacalhau-base-market-1470043155743.css" rel="stylesheet">
                <link href="<?php echo ROOT ?>assets/style.css" rel="stylesheet">
                <!-- Theme CSS -->
                <link href="<?php echo ROOT ?>assets/css/theme.css" rel="stylesheet">


                <!-- Head Libs -->

                <script src="<?php echo ROOT ?>assets/plugins/modernizr.custom.js"></script>
                <script src="<?php echo ROOT ?>assets/plugins/jquery/jquery-1.11.1.min.js"></script>
                <script type="text/javascript" src="<?php echo ROOT ?>assets/js/validation.js"></script>
                <script type="text/javascript" src="<?php echo ROOT ?>assets/js/facebook.js"></script>
                

<!--[if lt IE 9]>
                <script src="../assets/plugins/iesupport/html5shiv.js"></script>
                <script src="../assets/plugins/iesupport/respond.min.js"></script>
                <![endif]-->
            </head>
            <body id="home" class="boxed">
                <!-- PRELOADER -->
                <div id="preloader">
                    <div id="preloader-status">
                        <div class="spinner">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                        <div id="preloader-title">Loading</div>
                    </div>
                </div>
                <!-- /PRELOADER -->

                <!-- WRAPPER -->
                <div class="wrapper">

                    <!-- HEADER -->
                    <header class="header fixed">
                        <div class="header-wrapper">
                            <div class="container">

                                <!-- Logo -->
                                <!--div class="profile-box" id="profile-box">
                                    <a href="Views/my-account.html"><i class="fa fa-user"></i> <?php echo @$_SESSION['login'] ?></a> 
                                </div-->
                                <div class="logo">

                                    <a href="index.php"><img src="../assets/img/logo-rentit.png" alt="Rent It"/></a>
                                </div>
                                <!-- /Logo -->

                                <!-- Mobile menu toggle button -->
                                <a class="lng-box btn ripple-effect btn-theme-transparent">    AR</a>
                                <a href="#" class="menu-toggle btn ripple-effect btn-theme-transparent"><i class="fa fa-bars"></i></a>
                                <!-- /Mobile menu toggle button -->

                                <!-- Navigation -->
                                <nav class="navigation closed clearfix">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <!-- navigation menu -->
                                            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                                            <ul class="nav sf-menu">
                                                <li class="active"><a href="index.html">Annonces en Tunisie</a> </li>
                                                <li><a href="annonce-listing.html">Liste annonces en tunisie</a></li>
                                                <li><a href="my-account.html">Mes annonces</a></li>
                                                <li><a href="contact.html">Contactez nous </a></li>
                                                <li>
                                                    <ul class="social-icons">
                                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                    </ul>
                                                </li>
                                            </ul>

                                            <!-- /navigation menu -->
                                        </div>
                                    </div>
                                    <!-- Add Scroll Bar -->
                                    <div class="swiper-scrollbar"></div>
                                </nav>
                                <!-- /Navigation -->
                                <div class="nav-annonce"> 
                                    <ul class="annonce-menu">
                                        <li class="profile-box" id="profile-box" style="display: none">
                                            <a href="Views/my-account.html"><i class="fa fa-user"></i> <?php echo @$_SESSION['login'] ?></a> 
                                        </li>
                                        <li class="sale"> <a id="insertannonce">Deposer une  annonce </a></li>
                                        <li>
                                            <ul class="social-icons">
                                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul> 
                                </div>
                            </div>
                        </div>

                    </header>
                    <!-- /HEADER -->

                    <!-- CONTENT AREA -->
                    <div class="content-area">





            <section class='page-section breadcrumbs text-center'>
    <div class='container'>
        <div class='page-header'>
            <h1>Login</h1>
        </div>
        <ul class='breadcrumb'>
            <li><a href='#'>Home</a></li>
            <li><a href='#'>Pages</a></li>
            <li class='active'>Login</li>
        </ul>
    </div>
</section>
<!-- /BREADCRUMBS -->

<!-- PAGE -->
<section class='page-section color'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-6'>
                <h3 class='block-title'><span>Créer un compte</span></h3>
                <form action='#' class='form-inscription form-login'>
                    <div class='row'>

                        <div class='col-md-12'>

                            <div class='form-group right-addon inner-addon 'style="width:90%">
                                <i class='icon fa fa-user'></i>
                                <input class='form-control ' id='nam' type='text' placeholder=' Nom et prénom ' required></div> 
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group right-addon inner-addon' style="width:90%">
                                <i class='icon fa fa-envelope'></i>
                                <input class='form-control' type='Email' placeholder='Email' id='email'></div>
                                <small id="output_email"></small>
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group right-addon inner-addon' style="width:90%">
                                <i class='icon fa fa-phone'></i>
                                <input class='form-control' type='text' placeholder='Numéro de téléphone' id='numphone' required></div> 
                        </div>
                        <div class='col-md-12'>

                            <div class='form-group has-icon has-label selectpicker-wrapper ' style="width:90%">
                                <label>Régions</label>
                                <select class='selectpicker input-price' data-live-search='true' data-width='100%'
                                        data-toggle='tooltip' title='Select' id='region' required>
                                    <option value='Ariana'>Ariana</option>
                                    <option value='Tunis'>Tunis</option>
                                    <option>Ben arous</option>
                                    <option>Béja</option>
                                    <option>Jendouba</option>
                                    <option>Sfax</option>
                                    <option>Sousse</option>
                                    <option>Monastir</option>
                                    <option>Nabeul</option>
                                    <option>Gabes</option>
                                    <option>Tozeur</option>
                                    <option>kef</option>

                                </select>
                                
                            </div>


                        </div>
                        <div class='col-md-12'>
                                <div class='form-group right-addon inner-addon' style="width:90%">
                                <i class='icon fa fa-unlock-alt'></i>
                                <input class='form-control' type='password' placeholder='Mot de passe' id='password'>
                                
                                </div>
                                <div style="width:85%"><small id="output_pass1"></small>  </div>
                                
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group right-addon inner-addon' style="width:90%">
                                <i class='icon fa fa-unlock-alt'></i>
                                <input class='form-control' type='password' placeholder='Confirmer mot de passe' id='confirmedpass' >
                                <small id="output_pass2"  ></small>
                            </div>
                        </div>



                        <div class='col-md-12'>
                            <div id="status">
                            Remplir tous les champs
                            </div>
                            <a class='btn btn-theme btn-block btn-theme-dark'  onclick='inscription_makook()' style="width:90%; margin-left: 0 !important;">Créer un compte</a>
                        </div>


                    </div>
                </form>
            </div>
            <div class='col-sm-6'>
              
                <div class='row'>
                    <div class='col-md-12 hello-text-wrap'>
                        <div class='create-account'>
                            <div class='col-md-12  '>

                                <br/><p> Vous n'êtes pas encore inscrit ? <a href='#'>Creez votre compte .</a> En deux minutes</p>   <br/>
                                <span class='login-separator'> OU </span>
                            </div>
                            <div class='col-md-12 form-login'>
                                <p> Vous pouvez vous connecter via  Réseaux sociaux</p>
                                <a class='btn btn-theme btn-block  social-media-login facebook' onclick='login()' id='login'><i class='fa fa-facebook'></i>  Facebook</a>
                                <div align='center'>
                                <a class='btn btn-theme btn-block social-media-login   google' href='<?php echo $authUrl;?>'>Google</a>
                                </div>                              
                                
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


                    <script src="https://apis.google.com/js/client.js?onload=checkAuth">

                    </script>



                </div>
                <!-- /CONTENT AREA -->

                <!-- FOOTER -->
                <footer class="footer">
                    <div class="footer-meta">
                        <div class="container">
                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="copyright">&copy; 2015 Rent It — An One Page Rental Car Theme made with passion by jThemes Studio</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </footer>
                <!-- /FOOTER -->

                <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

            </div>
            <!-- /WRAPPER -->

            <!-- JS Global -->
            <script src="<?php echo ROOT ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
                <script src="<?php echo ROOT ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
                <script src="<?php echo ROOT ?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
                <script src="<?php echo ROOT ?>assets/js/theme.js"></script>

            <script src="<?php echo ROOT ?>assets/plugins/superfish/js/superfish.min.js"></script>
            <script src="<?php echo ROOT ?>assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
            <script src="<?php echo ROOT ?>assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
            <script src="<?php echo ROOT ?>assets/plugins/jquery.sticky.min.js"></script>
            <script src="<?php echo ROOT ?>assets/plugins/jquery.easing.min.js"></script>
            <script src="<?php echo ROOT ?>assets/plugins/jquery.smoothscroll.min.js"></script>
            <!--<script src="../assets/plugins/smooth-scrollbar.min.js"></script>-->
            <!--<script src="../assets/plugins/wow/wow.min.js"></script>-->
            <script>
                        // WOW - animated content
                        //new WOW().init();
            </script>
            <script src="<?php echo ROOT ?>assets/plugins/swiper/js/swiper.jquery.min.js"></script>
            <script src="<?php echo ROOT ?>assets/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
            <script src="<?php echo ROOT ?>assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

            <!-- JS Page Level -->
            <script src="<?php echo ROOT ?>assets/js/theme-ajax-mail.js"></script>

            <!--[if (gte IE 9)|!(IE)]><!-->

            <script src="<?php echo ROOT ?>assets/plugins/jquery.cookie.js"></script>


            <!--<![endif]-->









        </body>
    </html>
                   
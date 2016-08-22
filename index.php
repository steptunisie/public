<!DOCTYPE html>
<?php
//error_reporting(0);
error_reporting();
require './Controller/session.php';
require_once ('Controller/libraries/Google/autoload.php');
//session_destroy();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Makook Annonces</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <!-- CSS Global -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--link href="assets/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet"-->
        <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
        <link href="assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
        <link href="assets/plugins/animate/animate.min.css" rel="stylesheet">
        <link href="assets/plugins/swiper/css/swiper.min.css" rel="stylesheet">
        <link href="assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="assets/css/bacalhau-base-market-1470043155743.css" rel="stylesheet">
        <link href="assets/style.css" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="assets/css/theme.css" rel="stylesheet">
       
  
        <!-- Head Libs -->
        
        <script src="assets/plugins/modernizr.custom.js"></script>
        <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>
         
         <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
       <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
        
           
        <script src="assets/js/theme.js"></script>
           
        
        
        
        <script type="text/javascript">
                var apiKey = 'AIzaSyA3Yiw9CdDHSNl2yDbAYizhCD2BBPMuT-Q';
                var clientId = '34755965289-btbgmng941esjtv3lmsfc17lb86q5ph3.apps.googleusercontent.com';
                var scopes = 'profile';
                var auth2; // The Sign-In object.
                var authorizeButton = document.getElementById('authorize-button');
                var signoutButton = document.getElementById('signout-button');
            $(document).ready(function () {
     

               

                $('#authorize-button').click(
                        function (e) {
                            e.handleClientLoad();
                        });





         

                $(".content-area").load("Views/search.php");
<?php if (isset($_SESSION['login'])) { ?>
                    document.getElementById('themeConfig').style.visibility = 'hidden';

<?php } else {
    ?>
                    document.getElementById('profile-box').style.visibility = 'hidden';
<?php }
?>
                $("#inscription").on("click", function (e) {

                    $(".content-area").load("Views/inscription.php");
                    document.getElementById('themeConfig').style.visibility = 'hidden';
                });
                $("#insertannonce").on("click", function (e) {

                    $(".content-area").load("Views/createannonce.php");
                    document.getElementById('themeConfig').style.visibility = 'hidden';
                });


            });
        </script>
        <script>
            function handleClientLoad() {
                alert();
                // Load the API client and auth library
                gapi.load('client:auth2', initAuth);
            }
            function initAuth() {
                alert();
                gapi.client.setApiKey(apiKey);
                gapi.auth2.init({
                    client_id: clientId,
                    scope: scopes
                }).then(function () {
                    auth2 = gapi.auth2.getAuthInstance();
                    // Listen for sign-in state changes.
                    auth2.isSignedIn.listen(updateSigninStatus);
                    // Handle the initial sign-in state.
                    updateSigninStatus(auth2.isSignedIn.get());
                    handleAuthClick;
                    signoutButton.onclick = handleSignoutClick;
                });
            }
            function updateSigninStatus(isSignedIn) {
                if (isSignedIn) {
                    authorizeButton.style.display = 'none';
                    signoutButton.style.display = 'block';
                    makeApiCall();
                } else {
                    authorizeButton.style.display = 'block';
                    signoutButton.style.display = 'none';
                }
            }
            function handleAuthClick(event) {
                auth2.signIn();
            }
            function handleSignoutClick(event) {
                auth2.signOut();
            }
            // Load the API and make an API call.  Display the results on the screen.
            function makeApiCall() {
                alert('aaaa');
                gapi.client.load('people', 'v1', function () {
                    var request = gapi.client.people.people.get({
                        resourceName: 'people/me'
                    });

                    request.execute(function (resp) {

                        var email = '';
                        if (resp)
                        {
                            for (i = 0; i < resp.names[0].length; i++)
                            {
                                if (resp.names[0][i]['type'] == 'account')
                                {
                                    email = resp.names[0][i]['value'];
                                }
                            }
                        }
                        var firstName = resp.names[0].givenName;
                        var LastName = '';
                        if (resp.names[0].familyName != '' || resp.names[0].familyName != 'undefined') {
                            LastName = resp.names[0].familyName;
                        }

                        var address = '';
                        if (resp.names[0]['placesLived'])
                        {
                            address = resp.names[0]['placesLived'][0].value;
                        }

                        $.ajax({
                            type: "POST",
                            url: "/api/social/signup-login",
                            data: {firstname: firstName, lastname: LastName, email: email, password: '', signupsource: 2, address: address}
                        }).done(function (data) {
                            //console.log(data);
                            location = '/admin/index/events';
                        });
                        console.log(firstName);
                        //var p = document.createElement('p');
                        // p.appendChild(document.createTextNode('Hello, '+firstName+LastName+'!'));
                        // document.getElementById('content').appendChild(p);
                    });
                });
                // Note: In this example, we use the People API to get the current
                // user's name. In a real app, you would likely get basic profile info
                // from the GoogleUser object to avoid the extra network round trip.
                //  console.log(auth2.currentUser.get().getBasicProfile().getGivenName());
            }

            function loginCallback(result)
            {
                if (result['status']['signed_in'])
                {


                } else {
                    // Update the app to reflect a signed out user
                    // Possible error values:
                    //   "user_signed_out" - User is signed-out
                    //   "access_denied" - User denied access to your app
                    //   "immediate_failed" - Could not automatically log in the user
                    console.log('Sign-in state: ' + result['error']);
                }

            }
           

        </script>
             
        
        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.min.js"></script>
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

                            <a href="index.php"><img src="assets/img/logo-rentit.png" alt="Rent It"/></a>
                        </div>
                        <!-- /Logo -->

                        <!-- Mobile menu toggle button -->
                        <a class="lng-box btn ripple-effect btn-theme-transparent drapeau">   </a>
                        <a href="#" class="menu-toggle btn ripple-effect btn-theme-transparent"><i class="fa fa-bars"></i></a>
                        <!-- /Mobile menu toggle button -->

                        <!-- Navigation -->
                        <nav class="navigation closed clearfix">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <!-- navigation menu -->
                                    <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                                    <ul class="nav sf-menu">
                                        <li class="active"><a href="index.php">Annonces en Tunisie</a> </li>
                                        <li><a href="annonce-listing.php">Liste annonces en tunisie</a></li>
                                        <li><a href="my-account.php">Mes annonces</a></li>
                                        <li><a href="contact.php">Contactez nous </a></li>
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
                                    <li class="profile-box" id="profile-box">
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

                <!--     content    -->
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
<div class="right-buttons " >
                    <a class="button gray-dark-bg ban mvs phs ahBinded" data-modal="true" data-url="/index/getcontacts">
                <div class="left small-9 pan fsize-12">
                    <div class="bold ellipsis">Contactez-nous</div>
                    
                </div>
                
            </a>
                <a class="button secondary ban mvs phs" href="/createproduct/start/">
            <div class="left small-9 pan ellipsis pts">
                <span class="fsize-14">Votre avis</span>
            </div>
            
        </a>
        <a class="button blue-bg ban mvs phs ahBinded" data-modal="true" data-url="/cms/get?block=footer_mobile_apps">
            <div class="left small-9 pan ellipsis pts">
                <span class="fsize-14">Applications</span>
            </div>
            
        </a>
    </div>
        <!-- JS Global -->
          
       
        <script src="assets/plugins/superfish/js/superfish.min.js"></script>
        <script src="assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
        <script src="assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
        <script src="assets/plugins/jquery.sticky.min.js"></script>
        <script src="assets/plugins/jquery.easing.min.js"></script>
        <script src="assets/plugins/jquery.smoothscroll.min.js"></script>
        <!--<script src="assets/plugins/smooth-scrollbar.min.js"></script>-->
        <!--<script src="assets/plugins/wow/wow.min.js"></script>-->
        <script>
            // WOW - animated content
            //new WOW().init();
        </script>
        <script src="assets/plugins/swiper/js/swiper.jquery.min.js"></script>
        <script src="assets/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
        <script src="assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

        <!-- JS Page Level -->
        <script src="assets/js/theme-ajax-mail.js"></script>

           <!--[if (gte IE 9)|!(IE)]><!-->
  
         <script src="assets/plugins/jquery.cookie.js"></script>
        <script src="assets/js/theme-config.js"></script>
        
           <!--<![endif]-->
      
      






     
    </body>
</html>
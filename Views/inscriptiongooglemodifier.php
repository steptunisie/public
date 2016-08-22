<?php 
require '../include/init.php';
//require  '../Controller/config.php';
require '../Controller/session.php';


//session_destroy();
?>

<!-- Theme CSS -->
<link href="assets/style.css" rel="stylesheet">
<!-- Theme CSS -->

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1745416802412446',
            xfbml: true,
            version: 'v2.7'
        });

        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                document.getElementById('themeConfig').style.visibility = 'hidden';

                //document.getElementById('login').style.visibility = 'hidden';
            } else if (response.status === 'not_authorized') {
                //document.getElementById('status').innerHTML = 'We are not logged in.'
            } else {
                //document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function login() {
        FB.login(function (response) {
            if (response.status === 'connected') {
                $(".content-area").load("Views/search.php");
                getInfo();

            } else if (response.status === 'not_authorized') {
                //document.getElementById('status').innerHTML = 'We are not logged in.'
            } else {
                //document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
            }
        }, {scope: 'publish_actions'});
    }

    // getting basic user info
    function getInfo() {
        FB.api('/me', 'GET', {fields: 'first_name,last_name,email,gender,birthday,bio,hometown,education,quotes,cover,work,devices'}, function (response) {
            var fa = $('<i />')
                    .addClass('fa fa-user');
            $('last_name').append(fa);
          if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "Controller/session.php?moyen="+'facebook'+"&id="+response.id+"&last_name="+response.last_name +"&first_name=" + response.first_name+"&email="+response.email+ "&gender="+response.gender+"&birthday="+response.birthday+"&bio="+response.bio+"&hometown="+response.hometown+"&education="+response.education+"&quotes="+response.quotes+"&cover="+response.cover+"&work="+response.work+"&devices="+response.devices , true);
            xmlhttp.send();
            document.getElementById('last_name').innerHTML = response.last_name + "  " +response.first_name;
            



        });
    }

    // posting on user timeline
    function post() {
        FB.api('/me/feed', 'post', {message: 'my first status...'}, function (response) {
            //document.getElementById('status').innerHTML = response.id;
        });
    }
    
    
    function inscription(){
        
        var $this = $(this); // L'objet jQuery du formulaire  confirmedpass  password region numphone email
        var name = $('#nam').val();
        var confirmedpass = $('#confirmedpass').val();
        var password=$('#password').val();
        var region=$('#region').val();
        var numphone=$('#numphone').val();
        var email=$('#email').val();
        var moyen=name+email;
        
        
         if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.open("GET", "Controller/session.php?moyen="+'makook'+"&id="+moyen+"&last_name="+name +"&first_name="+name+"&email="+email+"&numphone="+numphone+"&region="+region+"&password="+password, true);
            xmlhttp.send();
       
        
    }
    
</script>
 <script type="text/javascript">
      // Your Client ID can be retrieved from your project in the Google
      // Developer Console, https://console.developers.google.com
      var CLIENT_ID = '184753078742-jmk9t9hut7blp2quemmdqocl90p4ddub.apps.googleusercontent.com';
      var SCOPES = ["https://www.googleapis.com/auth/calendar.readonly"];

      /**
       * Check if current user has authorized this application.
       */
      function checkAuth() {
        gapi.auth.authorize(
          {
            'client_id': CLIENT_ID,
            'scope': SCOPES.join(' '),
            'immediate': true
          }, handleAuthResult);
      }

      /**
       * Handle response from authorization server.
       *
       * @param {Object} authResult Authorization result.
       */
      function handleAuthResult(authResult) {
        var authorizeDiv = document.getElementById('authorize-div');
        if (authResult && !authResult.error) {
          // Hide auth UI, then load client library.
          authorizeDiv.style.display = 'none';
          loadCalendarApi();
        } else {
          // Show auth UI, allowing the user to initiate authorization by
          // clicking authorize button.
          authorizeDiv.style.display = 'inline';
        }
      }

      /**
       * Initiate auth flow in response to user clicking authorize button.
       *
       * @param {Event} event Button click event.
       */
      function handleAuthClick(event) {
        gapi.auth.authorize(
          {client_id: CLIENT_ID, scope: SCOPES, immediate: false},
          handleAuthResult);
        return false;
      }

      /**
       * Load Google Calendar client library. List upcoming events
       * once client library is loaded.
       */
      function loadCalendarApi() {
     
            gapi.client.load('people', 'v1', function() {
              var request = gapi.client.people.people.get({
                resourceName: 'people/me'
              });
              request.execute(function(resp) {
                var p = document.createElement('p');
                var name = resp.names[0].givenName;
                p.appendChild(document.createTextNode('Hello, '+name+'!'));
                document.body.appendChild(p);
              });
            });
            console.log(auth2.currentUser.get().getBasicProfile().getGivenName());
      }

      /**
       * Print the summary and start datetime/date of the next ten events in
       * the authorized user's calendar. If no events are found an
       * appropriate message is printed.
       */
      function listUpcomingEvents() {
        var request = gapi.client.calendar.events.list({
          'calendarId': 'primary',
          'timeMin': (new Date()).toISOString(),
          'showDeleted': false,
          'singleEvents': true,
          'maxResults': 10,
          'orderBy': 'startTime'
        });

        request.execute(function(resp) {
          var events = resp.items;
          appendPre('Upcoming events:');

          if (events.length > 0) {
            for (i = 0; i < events.length; i++) {
              var event = events[i];
              var when = event.start.dateTime;
              if (!when) {
                when = event.start.date;
              }
              appendPre(event.summary + ' (' + when + ')')
            }
          } else {
            appendPre('No upcoming events found.');
          }

        });
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('output');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

    </script>
    <script src="https://apis.google.com/js/client.js?onload=checkAuth">
    </script>






<section class="page-section breadcrumbs text-center">
    <div class="container">
        <div class="page-header">
            <h1>Login</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Login</li>
        </ul>
    </div>
</section>
<!-- /BREADCRUMBS -->

<!-- PAGE -->
<section class="page-section color">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="block-title"><span>Créer un compte</span></h3>
                <form action="#" class="form-login">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group right-addon inner-addon ">
                                <i class="icon fa fa-user"></i>
                                <input class="form-control " id="nam" type="text" placeholder=" Nom et prénom "></div> 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group right-addon inner-addon">
                                <i class="icon fa fa-envelope"></i>
                                <input class="form-control" type="Email" placeholder="Email" id="email"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group right-addon inner-addon">
                                <i class="icon fa fa-phone"></i>
                                <input class="form-control" type="text" placeholder="Numéro de téléphone" id="numphone"></div> 
                        </div>
                        <div class="col-md-12">

                            <div class="form-group has-icon has-label selectpicker-wrapper ">
                                <label>Régions</label>
                                <select class="selectpicker input-price" data-live-search="true" data-width="100%"
                                        data-toggle="tooltip" title="Select" id='region'>
                                    <option value="Ariana">Ariana</option>
                                    <option value="Tunis">Tunis</option>
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
                                <span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group right-addon inner-addon">
                                <i class="icon fa fa-unlock-alt"></i>
                                <input class="form-control" type="password" placeholder="Mot de passe" id='password'></div> 
                        </div>
                        <div class="col-md-12">
                            <div class="form-group right-addon inner-addon">
                                <i class="icon fa fa-unlock-alt"></i>
                                <input class="form-control" type="password" placeholder="Confirmer mot de passe" id='confirmedpass'></div>
                        </div>



                        <div class="col-md-6">
                            <a class="btn btn-theme btn-block btn-theme-dark"  onclick="inscription()">Créer un compte</a>
                        </div>


                    </div>
                </form>
            </div>
            <div class="col-sm-6">
              
                <div class="row">
                    <div class="col-md-12 hello-text-wrap">
                        <div class="create-account">
                            <div class="col-md-12  ">

                                <br/><p> Vous n'êtes pas encore inscrit ? <a href="#">Creez votre compte .</a> En deux minutes</p>   <br/>
                                <span class="login-separator"> OU </span>
                            </div>
                            <div class="col-md-12 form-login">
                                <p> Vous pouvez vous connecter via  Réseaux sociaux</p>
                                <a class="btn btn-theme btn-block  social-media-login facebook" onclick="login()" id="login"><i class="fa fa-facebook"></i>  Facebook</a>
                               <a class='btn btn-theme btn-block social-media-login   google' id="authorize-button" onclick="handleAuthClick(event)"><i class='fa fa-google-plus'></i> Google</a>
                              
                                
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /PAGE -->

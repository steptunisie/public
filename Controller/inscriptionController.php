<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
error_reporting();
$client_id = '347426381041-9vhc4g0en5ktio2ai791dk29r8n1p4vm.apps.googleusercontent.com';
$client_secret = 'G4O8dSPcBgJC_M2hfGeWMpZy';
$redirect_uri = 'http://www.makook.tn/eya/Public/v4/inscription/';



include 'init/init.php';

require '../include/init.php';
//require  '../Controller/config.php';
require 'session.php';

include '../Modeles/autoloader.php';

require_once ('libraries/Google/autoload.php');




//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/

 if (isset($_GET['logout'])) {
        unset($_SESSION['access_token']);
        session_destroy();
        session_destroy();
    }
if(!empty($_SESSION['login'])){
  

                        $UserCHECK = new UsersPDO('clients');
                        //var_dump($_SESSION);
                        $users = $UserCHECK->getUSERByID($_SESSION['id']);
                        //var_dump($users);
                        echo '<img src="" style="float: right;margin-top: 33px;" />';

                       echo '<img src="" style="float: right;margin-top: 33px;" />';
                          if($users['0']['valid']==0){
                              
                              echo "valider votre compt";
                           }
                           echo @$_GET[msg];
                        //var_dump($users);
                          echo 'Hi ' . $users['0']['lname'] . ', Thanks for Registering! [<a href="' . $redirect_uri . '?logout=1" >Log Out</a>]';
                        //print user details
                        echo '<pre>';

                        echo '</pre>';
    

                        //print user details
                        echo '<pre>';

                        echo '</pre>';
    
    
    

} else {

//incase of logout request, just unset the session var
   

    /*     * **********************************************
      Make an API request on behalf of a user. In
      this case we need to have a valid OAuth 2.0
      token for the user, so we need to send them
      through a login flow. To do this we need some
      information from our API console project.
     * ********************************************** */
    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope("email");
    $client->addScope("profile");

    /*     * **********************************************
      When we create the service here, we pass the
      client to it. The client then queries the service
      for the required scopes, and uses that when
      generating the authentication URL later.
     * ********************************************** */
    $service = new Google_Service_Oauth2($client);

    /*     * **********************************************
      If we have a code back from the OAuth 2.0 flow,
      we need to exchange that with the authenticate()
      function. We store the resultant access token
      bundle in the session, and redirect to ourself.
     */

    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        exit;
    }


    /*     * **********************************************
      If we have an access token, we can make
      requests, else we generate an authentication URL.
     * ********************************************** */
    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
    } else {
        $authUrl = $client->createAuthUrl();
    }


//Display user info or display login url as per the info we have.

    if (isset($authUrl)) {
        include '../Views/inscription.php';
         } else {

                        $user = $service->userinfo->get();

                        $UserCHECK = new UsersPDO('clients');
                        $users = $UserCHECK->existe($user->id);

                        
                        if ($users['0']['nb'] != '0') { //if user already exist change greeting text to "Welcome Back"
                           
                        $_SESSION['login'] = $user->name;
                        header("Location: ".$redirect_uri);
                        } else { //else greeting text "Thanks for registering"


                            $infoUser['oauth_uid'] = $user->id;
                            $infoUser['fname'] = $user->givenName;
                            $infoUser['lname'] = $user->familyName;
                            $infoUser['email'] = $user->email;
                            $infoUser['gpluslink'] = $user->link;
                            $infoUser['picture'] = $user->picture;
                            $infoUser['gender'] = $user->gender;
                            $infoUser['oauth_provider'] = 'google';
                            $UserCHECK->adddata($infoUser);
                            $_SESSION['login'] = $user->name;
                            $_SESSION['id']=$user->id;
                            header("Location: ".$redirect_uri);
                        }

                        //print user details
                        echo '<pre>';

                        echo '</pre>';
                    }
                    echo '</div>';
                    ?>









                    <!--end inscription google-->










                    




<?php } ?>













<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '347426381041-an9p0bcd3hbfplf1uvvj21hfre1vr1kn.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'UwAU3xmG1ixY1QUPtqUszW_v'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost.com/AdminProject/Public/';  //return url (url to script)
$homeUrl = 'http://localhost.com/AdminProject/Public/';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to makook.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
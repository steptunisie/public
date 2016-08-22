<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
//echo "session";
error_reporting(0);
session_start();

if(isset($_GET['id']))
{
    $_SESSION['login']="";
require ("../Modeles/autoloader.php");
require ("../Modeles/UsersPDO.php");
$userProfile[]=@$_GET;
//var_dump($expression)
$gUser = new UsersPDO('clients');
//echo '$userProfile[]'.@$userProfile[0]['id'];
$gUser->checkUser(@$userProfile[0]['moyen'],@$userProfile[0]['region'],@$userProfile[0]['password'], @$userProfile[0]['id'], @$userProfile[0]['last_name'], @$userProfile[0]['first_name'], @$userProfile[0]['email'], @$userProfile[0]['gender'], @$userProfile[0]['locale'], @$userProfile[0]['link'], @$userProfile[0]['picture'],0);
$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
//header("location: ../Views/account.php");
//$_SESSION['token'] = $gClient->getAccessToken();
$_SESSION['login'] = @$userProfile[0]['first_name']."  ".@$userProfile[0]['last_name'];
$_SESSION['id']=@$userProfile[0]['id'];

$_SESSION['access_token']="ya29.CjBCA_gDGuzY2iIVYWw".$_SESSION['login']."WCGJ1Rj39clJ2H9vpxgBTZFx0kCB242--7NRfJTCcwuBqV94";
if($userProfile[0]['moyen']=='makook'){

   $validation=new validation('clients',$userProfile[0]['email'],$userProfile[0]['id']);



}


//var_dump($_SESSION);

//header("location: ../index.php");
}


 

?>
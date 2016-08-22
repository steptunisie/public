<?php 
/**
 * 
 *
 * @author Eya  Nextweb
 */
$redirect_uri = 'http://www.makook.tn/eya/Public/v4/inscription/';
include '../Modeles/autoloader.php';
if(isset($_GET) && (@$_GET['cle']))
{var_dump($_GET);

$login = $_GET['id'];
$cle = $_GET['cle'];
 
 $user=new UsersPDO('clients');
 $users=$user->getActivekeyUser($login);
 //var_dump($users);
//On teste la valeur de la variable $actif récupéré dans la BDD
if($users[0]['valid'] == '1') // Si le compte est déjà actif on prévient
  {
    header("Location: http://www.makook.tn/eya/Public/v4/inscription/");
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($cle == $users[0]['keyuser'] ) // On compare nos deux clés    
       {
          // Si elles correspondent on active le compte !   
          //echo "Votre compte a bien été activé !";

          $user->activeUser($login);
          header("Location: ".$redirect_uri."?msg=activation_success");
 
          
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          //echo "Erreur ! Votre compte ne peut être activé...";
          header("Location: ".$redirect_uri);
       }
  }



}
if(!empty($_POST['pass1_check']) && !empty($_POST['pass2_check'])){
	if(strlen($_POST['pass1_check']) < 6 || strlen($_POST['pass1_check'])  < 6){
		echo '<br/>Trop court (6 caractères minimum)';
		exit();
	} else if($_POST['pass1_check'] == $_POST['pass2_check']){
		echo 'success';
		exit();
	} else {
		echo '<br/>Les deux mots de passe sont différents';
		exit();
	}

}
if(!empty($_POST['email_check'])){
	 $email = $_POST['email_check'];
	
	//Vérifier l'adresse mail
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  
		echo '<br/>Adresse email invalide !';
		exit();
	}
	//Connexion à la base de données
	 $user=new UsersPDO('clients');
	 $numRows=$user->getnumberuser($_POST['email_check']);
	if($numRows > 0){
		echo '<br/>Adresse email déjà utilisée !';
		exit();
	} else {
		echo 'success';
		exit();
	}
}

?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categorie
 *
 * @author Eya  Nextweb
 */
class validation extends lib{

    private $table;
    private $destinataire;
    private $id;
    private $cle;
    private $data= array("key" => 0);

     function __construct($table,$destinataire,$id) {
       
        $this->table = $table;
        $this->destinataire=$destinataire;
        $this->con = $this->connetDB();
        $this->id=$id;
        $this->validation();
    }
    
    function validation(){
        $this->cle = md5(microtime(TRUE)*100000);    
        $this->date['keyuser']=$this->cle;
        //var_dump($this->date);
        $this->updatedata($this->date);
        $this->mail();





    }

    function updatedata($data) {
        $som="";
        foreach ($data as $key => $value) {
            
         $arkey[]=$key;
           $arvalue[]=$value;
          
                                                }
                                               
                                                
      // echo $tabKeys=  implode( ',',$arkey)  ; 
        //echo $tabvalue=  '"'.implode( '","',$arvalue).'"'  ;  
        for ($index = 0; $index < count($arkey)-1; $index++) {
           $som.="`".$arkey[$index]."`='".$arvalue[$index]."',";
        }
        $som.="`".$arkey[$index]."`='".$arvalue[$index]."'";
        //echo $som;
       $query='UPDATE `'.$this->table.'` SET '.$som.' where `oauth_uid`='.$this->id;
        //echo $query;
        $result=$this->con->select($query);
        //$this->id_insert=  $this->con->GetID();
        return $result;
        
        
        
    }
    function mail(){

        $destinataire = $email;
        $sujet = "Activer votre compte" ;
        $entete = "From: inscription@makook.tn" ;
 
        // Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = 'Bienvenue sur VotreSite,
 
        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou copier/coller dans votre navigateur internet.
 
        http://www.makook.tn/eya/Public/v4/Activation/'.urlencode($this->id).'/'.urlencode($this->cle).'
 
 
            ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';
       mail($this->destinataire, $sujet, $message, $entete) ;




    }
    







    //put your code here
}

<?php

/**
 * 
 *
 * @author Eya  Nextweb
 */
if(!empty($_POST)){
include '../Modeles/autoloader.php';
error_reporting();
$Annonce=new Add($_POST, 'annonce');
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


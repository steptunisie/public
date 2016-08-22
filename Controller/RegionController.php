<?php

if(!empty($_GET)){
//include '../Modeles/autoloader.php';
error_reporting();
$region= new Region('region');
$regions= $region->getRegionByCond('id_gov',$_GET['id_gov']);

 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

}
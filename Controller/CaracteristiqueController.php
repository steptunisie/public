<?php
include '../Modeles/autoloader.php';
error_reporting();
$sousCategorie= new SousCategorie('souscategorie');
$sousCategories= $sousCategorie->getSousCatByCond('id_souscategorie',$_POST['id_souscategorie']);
//var_dump($sousCategories);

if (!empty($sousCategories))
{ //var_dump($sousCategories);
    //echo count ($sousCategories['0']);
    
                for ($i = 3;$i < count($sousCategories['0']);$i++) {
                  //  echo $i;
                    if(!empty($sousCategories['0'][$i])){
                        $j=($i-2);
                        echo " <div class='form-group inner-addon '>
                            <i class='fa fa-bars icon' ></i>
                                <input class='form-control' id='{$sousCategories['0'][$i]}' type='text' placeholder='{$sousCategories['0'][$i]}' name='Val_Critere_{$j}'>"
                                . "</div> ";
                    }
                
                 }
echo "";





}
?>




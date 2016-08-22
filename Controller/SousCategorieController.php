
<?php
include '../Modeles/autoloader.php';
error_reporting();
$sousCategorie= new SousCategorie('souscategorie');
$sousCategories= $sousCategorie->getSousCatByCond('id_categorie',$_POST['id_Categorie']);
//var_dump($sousCategories);

if (!empty($sousCategories))
{ //var_dump($sousCategories);
    echo ""
    . ""
            . "<option> Sélectionner une sous catégorie </option>"; 
    
                for ($i = 0;$i < count($sousCategories);$i++) {
                 echo "  <option value='{$sousCategories[$i]['0']}'>{$sousCategories[$i]['1']} </option>";
                 }
echo "";





}

?>




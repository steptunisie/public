<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
include '../Modeles/autoloader.php';
error_reporting();
$categorie=new Categorie('categorie_annonce');
$categories=$categorie->getCategorie();

if ($categories!="")
{ 
    echo "<select id='cat-annonce-select' class='selectpicker' data-live-search='true' data-width='100%'  data-toggle='tooltip' title='Select'>"
    . "<option>choix</option>";
    
for ($i = 0;$i < count($categories);$i++) {
 echo "  <option value='{$categories[$i]['0']}'>{$categories[$i]['1']} </option>";
 }
echo "</select>";
}

?>

<script>
    var categorieAnnonce =$('#cat-annonce-select');
    
    $(document).ready(function(){
       
        function getXhr(){
                 var xhr = null; 
				if(window.XMLHttpRequest) // Firefox et autres
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ // Internet Explorer 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } 
					catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { // XMLHttpRequest non support par le navigateur 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
                                return xhr;
			}
        
                 categorieAnnonce.change(function() {
                  
               
              var xhr = getXhr();
				// On dfini ce qu'on va faire quand on aura la rponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('sous-cat-row').innerHTML = leselect;
					}
				}

				// Ici on va voir comment faire du post
				xhr.open('POST','Controller/SousCategorieController',true);
				// ne pas oublier a pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id de l'auteur
				sel = document.getElementById('cat-annonce-select');
				id_cat_produit = sel.options[sel.selectedIndex].value;
				xhr.send("id_Categorie="+id_cat_produit);
				var select_cat=document.getElementById('cat-annonce-select');
				var div = document.getElementById("sous-cat-row");
				if(select_cat.value!=-1){
				div.style.display="block";
				}
				else{
				div.style.display="none";
				}
            





});
                 




});
        
        
        
        
        
   
            
    
    </script>



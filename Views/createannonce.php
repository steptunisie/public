<script src="assets/js/mes-fonctions.js"></script> 
<div id="espace">
    <section class="page-section breadcrumbs text-center">
        <div class="container">
            <div class="page-header">
                <h1>Déposer une annonce</h1>
            </div>
            <ul class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li class="active">Déposer une annonce</li>
            </ul>
        </div>
    </section>
    <!-- /BREADCRUMBS -->

    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">
            <div class="row">
                  <form id="form-add-annonce"  class="form-login" > 
                <div class="col-sm-6">
                    <h3 class="block-title"><span>Créer une annonce</span></h3>
                  
                        <div class="row">
                            <label class="title-section">Votre annonce</label>
                            <div id="cat-annonce-section" class="col-md-12">
                                <div  id="cat-row" class="form-group has-icon has-label selectpicker-wrapper ">
                                    <?php
                                    include '../Modeles/autoloader.php';
                                    
                                    $categorie = new Display('categorie_annonce','');
                                    $categories = $categorie->getData() ;

                                    if ($categories != "") {
                                        echo "<select id='cat-annonce-select' class='form-control' title='Select'>"
                                        . "<option>choix</option>";

                                        for ($i = 0; $i < count($categories); $i++) {
                                            echo "  <option value='{$categories[$i]['0']}'>{$categories[$i]['1']} </option>";
                                        }
                                        echo "</select>";
                                    }
                                    ?>

                                    <script>
                                        var categorieAnnonce = $('#cat-annonce-select');

                                        $(document).ready(function () {



                                            $("#form-add-annonce").submit(function (e) {

                                                var url = "Controller/AnnonceController.php"; // the script where you handle the form input.

                                                $.ajax({
                                                    type: "POST",
                                                    url: url,
                                                    data: $("#form-add-annonce").serialize(), // serializes the form's elements.
                                                    success: function (data)
                                                    {
                                                        console.log(data);
                                                        $("#espace").load("Views/monprofile.php"); 
                                                        document.getElementById('themeConfig').style.visibility = 'hidden';
                                                        // show response from the php script.
                                                    }
                                                });

                                                e.preventDefault(); // avoid to execute the actual submit of the form.
                                            });
                                            
                                            function getXhr() {
                                                var xhr = null;
                                                if (window.XMLHttpRequest) // Firefox et autres
                                                    xhr = new XMLHttpRequest();
                                                else if (window.ActiveXObject) { // Internet Explorer 
                                                    try {
                                                        xhr = new ActiveXObject("Msxml2.XMLHTTP");
                                                    } catch (e) {
                                                        xhr = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                } else { // XMLHttpRequest non support par le navigateur 
                                                    alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
                                                    xhr = false;
                                                }
                                                return xhr;
                                            }

                                            categorieAnnonce.change(function () {
                                                $('#form-sous-cat').empty();

                                                var xhr = getXhr();
                                                // On dfini ce qu'on va faire quand on aura la rponse
                                                xhr.onreadystatechange = function () {
                                                    // On ne fait quelque chose que si on a tout reu et que le serveur est ok
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        leselect = xhr.responseText;

                                                        // On se sert de innerHTML pour rajouter les options a la liste
                                                        document.getElementById('sous-cat-row').innerHTML = leselect;

                                                    }
                                                }

                                                // Ici on va voir comment faire du post
                                                xhr.open('POST', 'Controller/SousCategorieController.php', true);
                                                // ne pas oublier a pour le post
                                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                // ne pas oublier de poster les arguments
                                                // ici, l'id de l'auteur
                                                sel = document.getElementById('cat-annonce-select');
                                                id_cat_produit = sel.options[sel.selectedIndex].value;
                                                xhr.send("id_Categorie=" + id_cat_produit);
                                                var select_cat = document.getElementById('cat-annonce-select');
                                                var div = document.getElementById("sous-cat-row");
                                                if (select_cat.value != -1) {
                                                    div.style.display = "block";
                                                } else {
                                                    div.style.display = "none";
                                                }






                                            });





                                        });
                                    </script>

                                </div>
                                <div class="form-group has-icon has-label selectpicker-wrapper col-md-12" >
                                    <select id='sous-cat-row' class='form-control' data-live-search='true' data-width='100%'  data-toggle='tooltip' title='Select' style="display: none" name="id_sousCategorie" >
                                    </select>
                                    <script >

                                        var SouscategorieAnnonce = document.getElementById('sous-cat-row');
                                        //alert(SouscategorieAnnonce);
                                        $(document).ready(function () {
                                            function getXhr() {
                                                var xhr = null;
                                                if (window.XMLHttpRequest) // Firefox et autres
                                                    xhr = new XMLHttpRequest();
                                                else if (window.ActiveXObject) { // Internet Explorer 
                                                    try {
                                                        xhr = new ActiveXObject("Msxml2.XMLHTTP");
                                                    } catch (e) {
                                                        xhr = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                } else { // XMLHttpRequest non support par le navigateur 
                                                    alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
                                                    xhr = false;
                                                }
                                                return xhr;
                                            }
                                            $('#sous-cat-row').change(function () {
                                                var div = document.getElementById("form-sous-cat");
                                                $('#form-sous-cat').empty();



                                                var xhr = getXhr();
                                                // On dfini ce qu'on va faire quand on aura la rponse
                                                xhr.onreadystatechange = function () {
                                                    // On ne fait quelque chose que si on a tout reu et que le serveur est ok
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        leselect = xhr.responseText;
                                                        // On se sert de innerHTML pour rajouter les options a la liste
                                                        document.getElementById('form-sous-cat').innerHTML = leselect;
                                                    }
                                                }

                                                // Ici on va voir comment faire du post
                                                xhr.open('POST', 'Controller/CaracteristiqueController.php', true);
                                                // ne pas oublier a pour le post
                                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                // ne pas oublier de poster les arguments
                                                // ici, l'id de l'auteur
                                                sel = document.getElementById('sous-cat-row');

                                                id_cat_produit = sel.options[sel.selectedIndex].value;
                                                xhr.send("id_souscategorie=" + id_cat_produit);
                                                var select_cat = document.getElementById('sous-cat-row');

                                                if (select_cat.value != -1) {
                                                    div.style.display = "block";
                                                } else {
                                                    div.style.display = "none";
                                                }

                                            });
                                        });

                                    </script>

                                </div>
                                
                            </div>
                            
                            <div id="form-sous-cat" class="col-md-12">
                                
                            </div>
                            <div class="col-md-12">
                            <div class="col-md-6 funkyradio">     
                                <input type="radio" value=""  /> Offre
                            </div>
                            <div class="col-md-6">
                                <input type="radio"  value="" /> Demande   
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group right-addon inner-addon ">

                                    <input class="form-control " id="titreAnnonce" type="text" placeholder=" Titre annonce" required="required" name="titre"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group right-addon inner-addon ">

                                    <textarea class="form-control " id="descriptionAnnonce" placeholder=" Description annonce"  name="description"></textarea></div>
                            </div>

                            <!--div class="col-md-12">
                                <div class="form-group has-icon has-label selectpicker-wrapper">
    
                                    <select class="selectpicker input-price" data-live-search="true" data-width="100%"  data-toggle="tooltip" title="Select">
                                        <option>Choisissez votre région </option>
                                    </select>
                                </div>
                            </div-->
                        </div>
                        
                
                </div>
                <div class="col-sm-6">
                     
                   <h3 class="block-title"><span>Vos informations</span></h3>
                   
                            
                            <div class="col-md-12">
                                <div class="form-group right-addon inner-addon ">
                                    <i class="icon fa fa-user"></i>
                                    <input class="form-control " id="userName" type="text" ></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group right-addon inner-addon">
                                    <i class="icon fa fa-envelope"></i>
                                    <input class="form-control" type="Email" placeholder="Email"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group right-addon inner-addon">
                                    <i class="icon fa fa-phone"></i>
                                    <input class="form-control" type="text" placeholder="Numéro de téléphone"></div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group right-addon inner-addon">
                                    <i class="icon fa fa-unlock-alt"></i>
                                    <input class="form-control" type="password" placeholder="Mot de passe"></div>
                            </div>




                           

                
                        <div class="col-md-6">
                                <button  class="btn btn-theme btn-block btn-theme-dark"  id="passeAnnonce" type="submit">je passe mon annonce</button>
                            </div>
                </div>
                    </form>
            </div>
        </div>
    </section>
</div>

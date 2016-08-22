<!DOCTYPE html>
<html lang="fr">
<head>
    <?php  include '../Modeles/autoloader.php';
    
    
    ?>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Makook annonces</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="../assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/plugins/swiper/css/swiper.min.css" rel="stylesheet">

    <link href="../assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="../assets/plugins/countdown/jquery.countdown.css" rel="stylesheet">
    <link href="../assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../assets/css/theme.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
    <!-- Head Libs -->
    <script src="../assets/plugins/modernizr.custom.js"></script>
    
   
     <script src="../assets/plugins/jquery/jquery-1.11.1.min.js"></script>
          
        <script src="../assets/js/theme.js"></script>
         <script src="../assets/js/mes-fonctions.js"></script>
    <!--[if lt IE 9]>
    <script src="assets/plugins/iesupport/html5shiv.js"></script>
    <script src="assets/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
    
    $(document).ready(function () {
//$("#cat-row").load("Controller/CategorieController.php");

 
    $("#content").on( "click", ".pagination a", function (e){
         
    
		e.preventDefault();
		var page = $(this).attr("data-page"); //get page number from link
                var gov=GET('id_gov');
                var cat= GET('id_cat');
             
		$("#content").load("../Views/annonce-paginee.php?page="+page+"&id_gov="+gov+"&id_cat="+cat ,function(){ //get content from PHP page
		
		});
		
	});
	
        function GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}

});

    
    </script>
</head>
<body id="home" class="wide">
<!-- PRELOADER -->

<!-- /PRELOADER -->

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header fixed">
        <div class="header-wrapper">
            <div class="container">

                <!-- Logo -->
                <div class="logo">
                    <a href="../index.php"><img src="../assets/img/logo-rentit.png" alt="Rent It"/></a>
                </div>
                <!-- /Logo -->

                <!-- Mobile menu toggle button -->
                <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                <!-- /Mobile menu toggle button -->

                <!-- Navigation -->
                <nav class="navigation closed clearfix">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- navigation menu -->
                            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                            <ul class="nav sf-menu">
                                <li class="active"><a href="../index.php">Annonces en Tunisie</a>
                                   
                                </li>
                                <li><a href="annonce-listing.html">Liste annonces en tunisie</a></li>
                                
                                <li><a href="contact.html">Contactez nous</a></li>
                                <li>
                                    <ul class="social-icons">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /navigation menu -->
                        </div>
                    </div>
                    <!-- Add Scroll Bar -->
                    <div class="swiper-scrollbar"></div>
                </nav>
                <!-- /Navigation -->

            </div>
        </div>

    </header>
    <!-- /HEADER -->

    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs text-left">
            <div class="container">
                <div class="page-header">
                    <h1>Liste des annonces</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Accueil</a></li> 
                    <li class="active">Liste des annonnces</li>
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar sub-page">
            <div class="container">
                
                   <div class="row">

                    <div class="list-annonces-menu" >
                        <div class="list-options">

                            <a href="#" class=""  > <span ><span>Toutes </span>, &nbsp;</span></a>
                            <a href="#"  class="" > <span>Particulier, </span> <span>&nbsp;</span>  </a> 
                            <a href="#"   class="">  <span>Professionnel</span><span>&nbsp;</span> </a>
                        </div>

                        <div class="list-view-options">
                            <a ><i class="fa fa-star"></i><span > Sauvegarder cette recherche</span> </a> 

                            <div class="select-tri-options ">
                                <select id="listSorting" class="select-tri-annonce" onchange="listSortingChange(this)">
                                    <option value="" data-value="trier_par_date">   Trier par : Date</option>
                                    <option value="" data-value="trier_par_prix" selected=""> Trier par : Prix </option>
                                </select>
                            </div>

                            <a id="showList"    class="list-icon-show"> <i class="fa fa-list"></i></a>
                            <a id="showGrid"     class=" list-icon-show"><i class="fa fa-th"></i> </a>
                        </div>
                    </div>


                </div>
                
                <div class="row">
                    <!-- CONTENT -->
                    <div class="col-md-9 content car-listing" id="content">

                        <!-- Car Listing -->
 <?php include '../Views/annonce-paginee.php';?>
                     

                    </div>
                    <!-- /CONTENT -->

                    <!-- SIDEBAR -->
                    <aside class="col-md-3 sidebar" id="sidebar">
                        <!-- widget -->
                        <div class="widget shadow widget-find-car">
                            <h4 class="widget-title">Recherche annonces</h4>
                            <div class="widget-content">
                                <!-- Search form -->
                                <div class="form-search light">
                                    <form id="form-search-annonce" action="#">

                                        <div class="form-group has-icon has-label">
                                            <label for="formSearchUpLocation3">Description</label>
                                            <input type="text" class="form-control" id="formSearchUpLocation3" placeholder="Que cherchez vous">
                                            <span class="form-control-icon"><i class="fa fa-map-marker"></i></span>
                                        </div>

                                        
                                    <div id="cat-annonce-section" >
                                        <div id="cat-row" class="form-group selectpicker-wrapper">
                                            <label>Catégorie</label>
                                            <select id="cat-annonce-select" class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip"  >
                                                <option>Sélectionner une catégorie</option>
                                                    <?php
                                    $categorie = new Display('categorie_annonce','');
                                    $categories = $categorie->getData() ;
                               
                                    if ($categories != "") {
                                     
                                        for ($i = 0; $i < count($categories); $i++) {
                                            echo "  <option value='{$categories[$i]['0']}'>{$categories[$i]['1']} </option>";
                                        }
                                       
                                    }
                                    ?>
                                            </select>
                                            
                                            
                                           
                                            
                                        </div>

                                        <div class="form-group has-icon has-label selectpicker-wrapper  " >
                                    <select id="sous-cat-row" class="form-control " data-live-search='true' data-width='100%'  data-toggle='tooltip' title='Select' style="display: none !important" name="id_sousCategorie" >
                                    
                                    </select>
                                    <script >
                                     var categorieAnnonce = $('#cat-annonce-select');
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
                                           // chargement de select de sous categorie
                                            categorieAnnonce.change(function () {
                                                $('#form-sous-cat').empty();
                                              alert('cat changed');
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
                                                xhr.open('POST', '../Controller/SousCategorieController.php', true);
                                                // ne pas oublier a pour le post
                                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                // ne pas oublier de poster les arguments
                                                // ici, l'id de l'auteur
                                                sel = document.getElementById('cat-annonce-select');
                                                id_cat_produit = sel.options[sel.selectedIndex].value;
                                                xhr.send("id_Categorie=" + id_cat_produit);
                                                var select_cat = document.getElementById('cat-annonce-select');
                                                var div = document.getElementById("sous-cat-row");
                                                if (select_cat.value !== -1) {
                                                    div.style.display = "block";
                                                  //  div.classList.add("selectpicker");
                                                } else {
                                                    div.style.display = "none";
                                                }
                                                //$("#sous-cat-row").selectpicker('refresh');

                                            });
 
                                            
                                            // chargement de critere de chaque sous categorie
                                            $('#sous-cat-row').change(function () {
                                                alert('sous cat changed');
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
                                                xhr.open('POST', '../Controller/CaracteristiqueController.php', true);
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


                                                 //submit search form 
                                               $("#form-search-annonce").submit(function (e) {

                                                var url = "Controller/AnnonceController.php"; // the script where you handle the form input.

                                                $.ajax({
                                                    type: "POST",
                                                    url: url,
                                                    data: $("#form-search-annonce").serialize(), // serializes the form's elements.
                                                    success: function (data)
                                                    {
                                                        console.log(data);
                                                        $("#espace").load("annonce-listing.php"); 
                                                        
                                                        // show response from the php script.
                                                    }
                                                });

                                                e.preventDefault(); // avoid to execute the actual submit of the form.
                                            });
                                            
                                            
                                    </script>

                                </div>
                                    </div>       
                                         
                                        <div   id="form-sous-cat"   >
                                          </div>
                                      
                                        <div class="form-group selectpicker-wrapper">
                                            <label>Ville</label>
                                            <select class="selectpicker input-price" data-live-search="true" data-width="100%" data-toggle="tooltip" title="Select">
                                                <option>Selectionner une ville</option>
                                                
                                                
                                                      <?php
                                     
                                    $gov = new Gouvernorat('gouvernorat');
                                    $listGov = $gov->getGouvernoratByCond('id_pays',1) ;// à modifier selon id pays
                                  //var_dump ($listGov)or die();
                                    if ($listGov != "") 
                                        {
                                         for ($i = 0;$i < count($listGov);$i++) {
                                              echo "  <option value='{$listGov[$i]['0']}'>{$listGov[$i]['1']} </option>";
                                        } 
                                    }
                                  
                                   
                                  
                                    ?>
                                            </select>
                                        </div>

                                        <button type="submit" id="formSearchSubmit3" class="btn btn-submit btn-theme btn-theme-dark btn-block">Rechercher</button>

                                    </form>
                                </div>
                                <!-- /Search form -->
                            </div>
                        </div>
                        <!-- /widget -->
                        <!-- widget price filter -->
                        <div class="widget shadow widget-filter-price">
                            <h4 class="widget-title">Price</h4>
                            <div class="widget-content">
                                <div id="slider-range"></div>
                                <input type="text" id="amount" readonly />
                                <button class="btn btn-theme btn-theme-dark">Filter</button>
                            </div>
                        </div>
                        <!-- /widget price filter -->
                        <!-- widget testimonials -->
                        <div class="widget shadow">
                            <div class="widget-title">Testimonials</div>
                            <div class="testimonials-carousel">
                                <div class="owl-carousel" id="testimonials">
                                    <div class="testimonial">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="testimonial-text">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</div>
                                                <div class="testimonial-name">John Doe <span class="testimonial-position">Co- founder at Rent It</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="testimonial-text">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</div>
                                                <div class="testimonial-name">John Doe <span class="testimonial-position">Co- founder at Rent It</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testimonial">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="testimonial-text">Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</div>
                                                <div class="testimonial-name">John Doe <span class="testimonial-position">Co- founder at Rent It</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /widget testimonials -->
                        <!-- widget helping center -->
                        <div class="widget shadow widget-helping-center">
                            <h4 class="widget-title">Helping Center</h4>
                            <div class="widget-content">
                                <p>Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros.</p>
                                <h5 class="widget-title-sub">+90 555 444 66 33</h5>
                                <p><a href="mailto:support@supportcenter.com">support@supportcenter.com</a></p>
                                <div class="button">
                                    <a href="#" class="btn btn-block btn-theme btn-theme-dark">Support Center</a>
                                </div>
                            </div>
                        </div>
                        <!-- /widget helping center -->
                    </aside>
                    <!-- /SIDEBAR -->

                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->

        <!-- PAGE -->
        
        <!-- /PAGE -->

    </div>
    <!-- /CONTENT AREA -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-meta">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <p class="btn-row text-center">
                            <a href="#" class="btn btn-theme btn-icon-left facebook"><i class="fa fa-facebook"></i>FACEBOOK</a>
                            <a href="#" class="btn btn-theme btn-icon-left twitter"><i class="fa fa-twitter"></i>TWITTER</a>
                            <a href="#" class="btn btn-theme btn-icon-left pinterest"><i class="fa fa-pinterest"></i>PINTEREST</a>
                            <a href="#" class="btn btn-theme btn-icon-left google"><i class="fa fa-google"></i>GOOGLE</a>
                        </p>
                        <div class="copyright">&copy; 2015 Rent It — An One Page Rental Car Theme made with passion by jThemes Studio</div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>
<!-- /WRAPPER -->

<!-- JS Global -->

<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="../assets/plugins/superfish/js/superfish.min.js"></script>
<script src="../assets/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="../assets/plugins/owl-carousel2/owl.carousel.min.js"></script>
<script src="../assets/plugins/jquery.sticky.min.js"></script>
<script src="../assets/plugins/jquery.easing.min.js"></script>
<script src="../assets/plugins/jquery.smoothscroll.min.js"></script>
<!--<script src="assets/plugins/smooth-scrollbar.min.js"></script>-->
<script src="../assets/plugins/swiper/js/swiper.jquery.min.js"></script>
<script src="../assets/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
<script src="../assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- JS Page Level -->
<script src="../assets/js/theme-ajax-mail.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/plugins/isotope/jquery.isotope.min.js"></script>
<script src="../assets/js/theme.js"></script>

 <!--[if (gte IE 9)|!(IE)]><!-->
 <script src="../assets/plugins/jquery.cookie.js"></script>
<script src="../assets/js/theme-config.js"></script>

 <!--<![endif]-->
</body>
</html>
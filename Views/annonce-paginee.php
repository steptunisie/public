        <?php
        include '../Controller/PaginationController.php';
        include_once '../Modeles/autoloader.php';
        error_reporting();
        global $id, $cond, $critere;
        $total_record = 0;
        $item_page = 10;

        if (isset($_GET["page"])) {
            $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
            if (!is_numeric($page_number)) {
                die('Invalid page number!');
            } //incase of invalid page number
        } else {

            $page_number = 1; //if there's no page number, set it to 1
        }


        if (isset($_GET['id_gov']) && isset($_GET['id_cat']) && ($_GET['id_gov']) !== 'null' && ($_GET['id_cat']) !== 'null') {

            // traitement recherche par cat et region to todo
        } else if (isset($_GET['id_gov']) && ($_GET['id_gov']) !== 'null') {
            // Listing par region

            $region = new Region('region');
            $critere = $region->getRegionByCond('id_gov', $_GET['id_gov']);

            $id = 'id_region';
            $cond = 'id_region';
        } else if (isset($_GET['id_cat']) && ($_GET['id_cat']) !== 'null') {
            // listing par catégorie

            $souscategorie = new SousCategorie('souscategorie');
            $critere = $souscategorie->getSousCatByCond('id_Categorie', $_GET['id_cat']);

            $id = 'id_sousCategorie';
            $cond = 'id_souscategorie';
        }

        //affichage des annonces selon region ou categorie
        if (isset($critere) && !empty($critere)) {

            $filtre = '';
            $filtre_array = array();
            for ($index = 0; $index < count($critere); $index++) {

                $filtre_array[$index] = $critere[$index][$cond];
            }

            $filtre = $id . ' IN (' . implode(",", $filtre_array) . ')';

            $annonce = new Annonce('annonce');
            $allannonces = $annonce->getDataBYcond($filtre);

            $total_record = count($allannonces);
            $page_position = (($page_number - 1) * $item_page);

            //$annonces = $annonce->getAnnonceByCond($id, $critere[$index][$cond]);   
            $annonces = $annonce->getAnnoncePagineeByCond($filtre, $page_position, $item_page);

            //var_dump($annonces);

            if (!empty($annonces)) {
                for ($i = 0; $i < count($annonces); $i++) {
                    ?>

                    <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                        <div class="media">
                            <a class="media-link" data-gal="prettyPhoto" href="../assets/img/preview/cars/car-370x220x5.jpg">
                                <img src="../assets/img/preview/cars/car-370x220x5.jpg" alt=""/>
                                <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                            </a>
                        </div>
                        <div class="caption">
                            <div class="rating">
                                <span class="star"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span><!--
                                --><span class="star active"></span>
                            </div>
                            <h4 class="caption-title"><a href="#"> <?php echo $annonces[$i]['titre']; ?> </a></h4>
                            <h5 class="caption-title-sub"><?php echo $annonces[$i]['Val_Critere_1']; ?></h5>
                            <div class="caption-text"> <?php echo $annonce->get_exctract(trim($annonces[$i]['description']),200); ?></div>
                            <table class="table">
                                <tr>
                                    <td><i class="fa fa-car"></i> 2013</td>
                                    <td><i class="fa fa-dashboard"></i> Diesel</td>
                                    <td><i class="fa fa-cog"></i> Auto</td>
                                    <td><i class="fa fa-road"></i> 25000</td>
                                    <td class="buttons"><a class="btn btn-theme" href="detail-annonce.php">Voir détails</a></td>
                                </tr>
                            </table>
                        </div> 

                    </div>
                    <?php
                }
            }
        } else {
            echo '<h1> pas des annonces trouvées pour cette catégorie</h1>';
        }

        //  <!-- /Car Listing -->
        //  <!-- Pagination -->
        echo paginate_function($page_number, 10, $total_record);


        // <!-- /Pagination -->       
        ?>  








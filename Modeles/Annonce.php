<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 
 *
 * @author Eya  Nextweb
 */

class Annonce extends lib {

    private $table;

    function __construct($table) {
        //$this->data = $data;
        $this->table = $table;
        $this->con = $this->connetDB();
    }

    function getAnnonce() {

        $row = "";
        try {
            $query = "SELECT * FROM $this->table ";
            //echo "Display".$this->table.$query;
            if (!$result = $this->con->select($query)) {
                throw new Exception("ERROR QYERY NOT EXCUTED");
            } else {
                $num = $this->con->selectTableau($query);
                if (count($num) > 0) {
                    foreach ($result as $key => $value) {
                        $row[$key] = $value;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $row;


        // var_dump($result);
    }

    function getAnnonceById($id) {

        $row = "";
        try {
            $query = "SELECT * FROM $this->table  WHERE $this->table.$id=$id";
            var_dump($query);

            if (!$result = $this->con->select($query)) {
                throw new Exception("ERROR QYERY NOT EXCUTED");
            } else {
                $num = $this->con->selectTableau($query);
                if (count($num) > 0) {
                    foreach ($result as $key => $value) {
                        $row[$key] = $value;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $row;
    }

    function getAnnonceByCond($id, $cond) {

        $row = "";
        try {
            $query = "SELECT * FROM $this->table where $this->table.$id=$cond ORDER BY id_$this->table";

            //echo "Display".$this->table.$query;
            if (!$result = $this->con->select($query)) {
                throw new Exception("ERROR QYERY NOT EXCUTED");
            } else {
                $num = $this->con->selectTableau($query);
                if (count($num) > 0) {
                    foreach ($result as $key => $value) {
                        $row[$key] = $value;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $row;
    }

    function getAnnoncePagineeByCond($cond, $page_position, $item_per_page) {

        $row = "";
        try {
            $query = "SELECT * FROM $this->table where $cond ORDER BY id_$this->table LIMIT  $page_position , $item_per_page";

            //echo "Display".$this->table.$query;
            if (!$result = $this->con->select($query)) {
                throw new Exception("ERROR QYERY NOT EXCUTED");
            } else {
                $num = $this->con->selectTableau($query);
                if (count($num) > 0) {
                    foreach ($result as $key => $value) {
                        $row[$key] = $value;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $row;
    }

    function getDataBYcond($con) {

        try {


            $query = "SELECT * FROM `$this->table` WHERE $con ";
            // echo $query;
            $stmt = $this->con->prepare($query);
            $stmt->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return $stmt->fetchAll();
    }
    
    function get_exctract($chaine,$nbcaractere)
    {
        $extrait= substr($chaine,0,$nbcaractere);
        $espace=strrpos($extrait,' ');
       return substr($extrait,0,$espace);
    }

}

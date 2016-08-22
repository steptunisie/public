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
class Categorie extends lib{

    private $table;

     function __construct($table) {
        //$this->data = $data;
        $this->table = $table;
         $this->con = $this->connetDB();
    }
    
    
    function getCategorie(){
       
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







    //put your code here
}

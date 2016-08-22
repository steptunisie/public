<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SousCategorie
 *
 * @author Eya  Nextweb
 */
class SousCategorie  extends lib{
    
     private $con;
    private $table;
    private $limit;

    function __construct($table) {
        //$this->data = $data;
        $this->table = $table;
         $this->con = $this->connetDB();
    }
    
    
    
    function getSousCategorie(){
        
        
        $row = "";
        try {
            $query = "SELECT * FROM $this->table";
           // echo "Display".$this->table.$query;
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




    //put your code here



function getSousCategorieById($id){
        try {
             
                $query = "SELECT * FROM $this->table WHERE id_$this->table=$id";
              
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

    function getSousCatByCond($id,$cond ){
       
           $row = "";
        try {
            $query = "SELECT * FROM $this->table where $id=$cond ORDER BY id_$this->table";
          
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
}

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
class Region extends lib{

    private $table;

     function __construct($table) {
        //$this->data = $data;
        $this->table = $table;
         $this->con = $this->connetDB();
    }
    
    
    function getRegion(){
       
           $row = "";
        try {
            $query = "SELECT * FROM $this->table ";
            
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
     
     
     
         function getRegionById($id){
       
           $row = "";
        try {
            $query = "SELECT * FROM $this->table where $this->table.$id='$id' ORDER BY $this->table.$id ASC ";
            
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
     
     
         function getRegionByCond($id,$cond){
       
           $row = "";
        try {
            $query = "SELECT * FROM $this->table where $this->table.$id = $cond ORDER BY $this->table.$id ASC ";
            
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
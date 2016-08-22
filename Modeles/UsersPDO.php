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
class UsersPDO extends lib{

    private $table;
    private $id_insert;

     function __construct($table) {
        //$this->data = $data;
        $this->table = $table;
         $this->con = $this->connetDB();
        // $this->id_insert=$id_insert;
    }
    
    
    function getUSERByID($id){
       
           $row = "";
        try {
            $query = "SELECT * FROM $this->table where oauth_uid='$id'";
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


    function adddata($data) {
        foreach ($data as $key => $value) {

            $arkey[] = $key;
            $arvalue[] = $value;
        }
        $tabKeys = implode(',', $arkey);
        $tabvalue = '"' . implode('","', $arvalue) . '"';
         $query = "INSERT INTO `$this->table` ($tabKeys) VALUES ($tabvalue)";

        $result = $this->con->select($query);
       // $this->id_insert = $this->conn->GetID();
        return $result;
    }
    function existe($id){
         $row = "";
        try {
            $query = "SELECT count(*) as nb FROM $this->table where oauth_uid=$id";
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
    function getActivekeyUser($login){




         $row = "";
        try {
            $query = "SELECT `valid`,`keyuser` FROM $this->table where oauth_uid='$login'";
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
    function activeUser($login){


         $row = "";
        try {
            $query = "UPDATE $this->table SET valid=1 where oauth_uid='$login'";
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

    function checkUser($oauth_provider,$region,$password,$oauth_uid,$fname,$lname,$email,$gender,$locale,$link,$picture,$valid){

                $new_password = md5($password);
                
        $prevQuery = "SELECT * FROM $this->table WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'";
        if (!$result = $this->con->select($prevQuery)) {
                throw new Exception("ERROR QYERY NOT EXCUTED");
            } 
            else {
                $num = $this->con->selectTableau($prevQuery);
                if (count($num) > 0) {
                    $update ="UPDATE $this->table SET region = '".$region."', password = '".$new_password."',oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."',gpluslink = '".$link."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'";
            $result = $this->con->select($update);
           
        }else{
                  //  die("INSERT INTO $this->table SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s"));
            $insert = "INSERT INTO $this->table SET region = '".$region."',password = '".$new_password."',oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', created = '".date("Y-m-d H:i:s")."',valid = '".$valid."', modified = '".date("Y-m-d H:i:s")."'";
            $result = $this->con->select($insert);
           
        }
            }

        
                  
            
        
        $query = "SELECT * FROM $this->table WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'";
        $result = $this->con->select($query);
        return $result;
    }


    function getnumberuser($email){

        $num = 0;
        try {
            $query = "SELECT `email` FROM $this->table where email='".$email."'";
          //echo "Display".$this->table.$query;
            if (!$result = $this->con->select($query)) {
                throw new Exception("ERROR QYERY NOT EXCUTED");
            } else {
                $num = $this->con->selectTableau($query);
                return count($num) ;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

        return count($num);



    }


    //put your code here
}

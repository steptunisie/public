<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
class Add extends lib {

    private $data;
    private $table;
    private $con;
    private $id_insert;

    function __construct($data, $table) {
        if (is_array($data)) {
            //  echo 'add 1' ; 
            $this->data = $data;
            $this->table = $table;
            $this->con = $this->connetDB();

            $this->adddata($this->data);
            // echo 'add 1' ; 
            //$this->con->close();
        } else {
            throw new Exception('ERROR: DATA NOT BE IN ARRAY');
        }
    }

    function GetNouId() {
        return $this->id_insert;
    }

    function adddata($data) {
        foreach ($data as $key => $value) {

            $arkey[] = $key;
            $arvalue[] = $value;
        }
        $tabKeys = implode(',', $arkey);
        $tabvalue = '"' . implode('","', $arvalue) . '"';
        echo $query = "INSERT INTO `$this->table` ($tabKeys) VALUES ($tabvalue)";

        $result = $this->con->select($query);
        $this->id_insert = $this->con->GetID();
        return $result;
    }

    //put your code here
}

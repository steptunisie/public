<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
class Display extends lib {

    private $con;
    private $table;
    private $limit;

    function __construct($table, $limit) {
        //$this->data = $data;
        $this->table = $table;
        $this->limit = $limit;
        $this->con = $this->connetDB();
    }

    function getData() {
        $row = "";
        try {
            $query = "SELECT * FROM `$this->table`   $this->limit";
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

    function getInNbrCompteurEventIndex($table, $condition = NULL) {



        $sql = "SELECT count(*) as nb FROM `" . $table . "`";
//echo $sql;
        if ($condition)
            $sql .=" WHERE " . $condition;

        //var_dump($sql);
        //die();

        $bdd = $this->ConexionMySQL();

        $reponse = $bdd->query($sql);

        return $reponse->fetch();
    }

    function getAllTableDetailPagniateEvent($table, $page_position, $item_per_page, $condtion = NULL) {

        $bdd = $this->ConexionMySQL();

        $sql = "SELECT * FROM " . $table;

        if ($condtion)
            $sql .=" WHERE " . $condtion;

        $sql .=" ORDER BY date DESC LIMIT " . $page_position . ", " . $item_per_page;



        $result = $bdd->query($sql);

        return $result;
    }

    function getActiveDataBYid($id) {
        $row = "";
        try {
            $query = "SELECT * FROM `$this->table` WHERE `compteur`='$id' ORDER BY `compteur` ASC";
            $query;
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

    function getActiveDataBYcond($con, $id) {
        $row = "";
        try {
            $query = "SELECT * FROM `$this->table` WHERE `$con`='$id' AND `statut`='active'ORDER BY `id_$this->table` $this->limit";
            // echo getActiveDataBYcond.$query;
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

    function getActiveDataBYcondBetwen($con) {
        $row = "";
        try {
            $query = "SELECT * FROM `$this->table` WHERE `statut`='active' AND $con ORDER BY `id_$this->table` $this->limit";
            //echo getActiveDataBYcondBetwen.$query;
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

    function getActiveDataBYtype($type) {
        $row = "";
        try {
            $query = "SELECT * FROM `$this->table` WHERE `type`='$type' AND `statut`='active'ORDER BY `id_$this->table`  ASC $this->limit";

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

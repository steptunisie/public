<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
class Database extends PDO {

    private $host;
    private $user;
    private $db;
    private $password;
    private $con;
    private $id;
    private $select; // requette de séléction 
    private $execute; // requette d'execution 
    private $email = 'nextwebplus@gmail.com'; // email de l'admin du site 

    public function __construct() {
        //database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'root'; //Define database username
		$dbPassword = ''; //Define database password
		$dbName = 'tnentu_entunisie'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->con = $con;
		}
    }

    public function GetID() {
        return $this->id;
    }

    public function select($reqSelect) {
        try {  
            $this->con = parent::beginTransaction();
            $result = parent::prepare($reqSelect);
            $result->execute();
            // $this->id=$result-;
            $this->id = PDO::lastInsertId();
            $this->con = parent::commit();

            // ou 
            // $this->con = parent::rollBack(); 
            var_dump($result);
            return $result;
        } catch (Exception $e) {
            //On indique par email que la requête n'a pas fonctionné. 
            error_log(date('D/m/y') . ' à ' . date("H:i:s") . ' : ' . $e->getMessage(), 1, 'artotal@gmail.com');
            $this->con = parent::rollBack();
            $message = new Message();
            $message->outPut('Erreur dans la requêtte', 'Votre requête a été abandonné');
        }
    }

    // renvoie un tableau que l'on peux travailler avec count($result)... 
    public function selectTableau($reqSelect) {
        
        $result = parent::prepare($reqSelect);
        var_dump($result);
        $result->execute();
        var_dump($result->execute());
        
        /* Récupération de toutes les lignes d'un jeu de résultats "équivalent à mysql_num_row() " */
        $resultat = $result->fetchAll();
       
        return $resultat;
    }

    // on change le type de base ici 
    public function getDns() {
        return 'mysql:dbname=' . $this->db . ';host=' . $this->host;
    }

    public function close() {
        $this->con = NULL;
    }

}

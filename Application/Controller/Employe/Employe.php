<?php 
//use Application\Model\DataBase\DataBase;
/*
 * Classe de gestion des employees
 * 
 */

require "Application\Model\DataBase\DataBase.php";

class Employe {
	private $nom_emp 		= null;
	private $prenom_emp 	= null;
	private $connexion = null;
	public function __construct() {
		
		$db = new DataBase();
		$this->connexion = $db::getInstance();
	}
	/*
	 * Getter function
	 * return $nom_emp
	 */
	public function getNomEmp(){
		return $this->nom_emp;
	}
	
	/*
	 * Setter function
	 * $param $nom : string
	 * return 
	 * 
	 */
	public function setNomEmp($nom = ""){
		$this->nom_emp = $nom;
	}
	
	public function getAllEmploye(){
		$requete = "select * from  emp;"; // where Employee_id = :id";
		
		try {
			$result = $this->connexion->prepare($requete);
			$result->execute();
		} catch (PDOException $e) {
			// Envoyer une error
			echo "error database " . $e->getMessage();
		}
		catch (Exception $e) {
			echo "error database " . $e->getMessage();
		}
		//exit;
	}
	
	/*
	 * Ajax function for put JSON format of List employes
	 * @params 
	 */
	public function Ajax_readAllEmploye(){
		$requete = "select * from emp "; //where Employee_id = :id";
		try {
			$result = $this->connexion->prepare($requete);
			$result->bindValue(':id', 1);
			$result->execute();
			
			foreach($result->fetchAll() as $key => $value) {
				$data[$key] = $value;
			}		
			ob_end_clean();		
			echo json_encode($data);
			flush();

		} catch (PDOException $e) {
			// Envoyer une error
			echo "error database " . $e->getMessage();
		}
		exit;
	}
}
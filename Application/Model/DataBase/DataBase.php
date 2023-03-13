<?php 
/*
 * class de gestion de base de donn�es
 * 
 */

class DataBase extends  PDO {
	
	// instance de connexion de DB, singleton
	private static $instance = null;
	
	public function __construct(){
		
		if( is_null(self::$instance) ) {
				self::$instance = new PDO("mysql:host=localhost;dbname=a_test_php", "root", "root");
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
			self::$instance;
	}
	
	
	/*
	 * Singleton de persistance de la connexion au BD
	 * @param 
	 * return $instance
	 */
	public static function getInstance(){
		try {
			if( is_null(self::$instance) )
			{	
					self::$instance= new PDO("mysql:host=localhost;dbname=a_test_php;charset=ISO-8859-1", "root", "root");
					self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			
		} catch (PDOException $e) {
			error_log("une erreur est survenue dans la DB : " . $e->getMessage());
			echo ("une erreur est survenue dans la DB : " . $e->getMessage());
		}
		
		return self::$instance;
	}
	
	
}




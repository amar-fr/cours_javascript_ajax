<?php
require "Application\Controller\Employe\Employe.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		
        <title>Formateur CDA/DWWM/BUREAUTIQUE</title>
        <!-- Respecter la largeur du mobile -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script type="text/javascript" src="Public/js/introduction.js"></script>
	    <script type="text/javascript" src="Public/js/ajax.js"></script>
	    <link rel="stylesheet" href="Public/css/style.css"/>
	    <link rel="icon" href="favicon.ico" />
	   
</head>

<body>
<?php 
ini_set("display_error", 1); 		// in prod mod
ini_set("error_reporting", E_ALL);  // E_NOTICE); // in prod mod
require __DIR__ . DIRECTORY_SEPARATOR . "Config" . DIRECTORY_SEPARATOR . "Config.php";

set_include_path(	get_include_path() . PATH_SEPARATOR .
					APPLICATION_PATH . "\Application\Controller\Employe"	. PATH_SEPARATOR .
					APPLICATION_PATH . "\Application\Model\DataBase"		.PATH_SEPARATOR .
					APPLICATION_PATH . "\Application\View" 				
			);


$Emp = new Employe();
$Emp->getAllEmploye();

switch (isset($_POST["Appel_Ajax"]) or isset($_GET["Appel_Ajax"])) {
	case 1 :
		// echo "Un appel AJAX";
		$Emp = new Employe();
		$Emp->Ajax_readAllEmploye();
		//var_dump($Mes_Emp);
		break;
	default :
		break;
}
echo "End index Ok"; // Message for user 
if( !isset($_SESSION['Compteur']) )
	$_SESSION['Compteur'] = 1;
?>
<div class="myButton">
	<button id="button_1" value="Effacer" onclick="Effacer_Liste_Employes()">Effacer la liste des employés en JavaScript</button>&nbsp;
	<button id="button_2" value="Effacer" onclick="getAllEmploye()">Récuperer et afficher la liste des employés en Ajax</button>
</div>
<br>
<div id='list_employes'>
</div>
</body>
</html>
<?php 
session_start();

$configs = include("src/config/config.php");

/*try{
	$strConnection = 'mysql:host='.$configs["db"]["host"].';dbname='.$configs["db"]["dbname"]; 
	$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 
	$pdo = new PDO($strConnection, $configs["db"]["user"], $configs["db"]["password"], $arrExtraParam); 
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	die('Error: '.$e->getMessage());
}*/
//ligne de commentaire

require_once("src/classes/Autoloader.php");
Autoloader::register();

$connect = new \Core\Db\ConnectPDO($configs["db"]);

$pages = include("src/config/pages.php"); 
$page = 'home';
if(isset($_GET["page"]) && $_GET["page"] != ''){
	$page = htmlspecialchars($_GET["page"]);
}
if(!(file_exists("src/pages/".$page.".php"))){
	$page = 'error';
	$code = '404';
	header($_SERVER["SERVER_PROTOCOL"]." ".$code);
}
$title = isset($pages[$page]["title"]) ? $pages[$page]["title"] : '';
$keywords = isset($pages[$page]["keywords"]) ? $pages[$page]["keywords"] : '';
$description = isset($pages[$page]["description"]) ? $pages[$page]["description"] : '';
 
$flashMessage = '';
ob_start();
try{
	include("src/pages/".$page.".php");
}
catch(Exception $e){
	$flashMessage = $e->getMessage();
}
$content = ob_get_contents();
ob_end_clean();

require_once 'src/templates/default.php';
?>
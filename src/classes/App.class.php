<?php
class App
{
	private static $config = array();
	private static $database;
	
	// Singleton
	private static $_instance = null;
	public static function init($config) {
		if(is_null(self::$_instance)){
			$c = __CLASS__;
			//$c = get_called_class(); 
			self::$_instance = new $c($config);
		}
		return self::$_instance;
	}
	
	protected function __construct($config)
	{
		if(count($config) != 4){
			throw new \Exception("Le nombre d'arguments n'est pas valable!");
		}
		self::$config = $config;
	}
	
	public static function db()
	{
		if(empty(self::$config)){
			throw new \Exception("Veuillez exécuter App::init() auparavant!");
		}
		elseif(self::$database === null){
			self::$database = new Core\Db\ConnectPDO(self::$config); 
		}
		return self::$database;
	}
}
?>
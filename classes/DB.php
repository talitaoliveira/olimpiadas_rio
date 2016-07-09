<?php

require_once (__DIR__ . '/config.php');

class DB{

	private static $instance;

	private function __construct(){

	}

	public static function getInstance(){

		if(!isset(self::$instance)){

			try{

				self::$instance = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);

			}catch(PDOExeption $e){
				echo $e->getMessage();
			}

		}

		return self::$instance;

	}
}

?>
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
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			}catch(PDOExeption $e){
				echo "ERRO PDO: " .$e->getMessage();
			}

		}

		return self::$instance;

	}
}

?>
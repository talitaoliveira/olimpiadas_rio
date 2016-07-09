<?php

class Util{

	public function __construct(){

	}

	public static function invereterData($data){
		try{

			list($ano,$mes,$dia) = explode('-', $data);

			$data_formatada = $dia."/".$mes."".$ano;

			return $data_formatada;

		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}
?>
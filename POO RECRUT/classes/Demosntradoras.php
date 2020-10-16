<?php
require_once("config.php");

class Demosntradora extends Usuarios{

	private $experiencias;
	private $altura;
	private $tm_blusa;
	private $tm_calca;
	private $tm_sapato;


	public function getExperiencias(){

		return $this->experiencias;
	}

	public function setExperiencias($experiencias){

		$this->experiencias = $experiencias;
	}

	public function getAltura(){

		return $this->altura;

	}

	public function setAltura($altura){

		$this->altura = $altura; 
	}

	public function getTm_calca(){

		return $this->tm_calca;
	}

	public function setTm_calca($tm_calca){

		$this->tm_calca = $tm_calca; 
	}

	public function getTm_blusa(){

		return $this->tm_blusa;
	}

	public function setTm_blusa($tm_blusa){

		$this->tm_blusa = $tm_blusa; 
	}	

	public function getTm_sapato(){

		return $this->tm_sapato;
	}

	public function setTm_sapato($tm_sapato){

		$this->tm_sapato = $tm_sapato; 
	}


	/*
		public function exibir(){

		return array(
			"experiencias: "=>$this->getExperiencias(),
			"Altura: " =>$this->getAltura(),
			"Tamanho blusa: "=>$this->getTm_blusa(),
			"Tamamnho calça:"=>$this->getTm_calca(),
			"Tamanho sapato:"=>$this->getTm_sapato());
	}
*/

}
/*	
	$dem = new Demosntradora();
	$dem ->setExperiencias("Diversos Cursos");
	$dem ->setAltura("1.78");
	$dem ->setTm_blusa("4");
	$dem ->setTm_calca("46");
	$dem ->setTm_sapato("42");

	var_dump($dem->exibir());

  */


?>
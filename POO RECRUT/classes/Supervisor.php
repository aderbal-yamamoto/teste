<?php
require_once("config.php");

class Supervisor extends Usuarios{

	private $deslogin;
	private $dessenha;


	public function getDeslogin(){

		return $this->deslogin; 

	}

	public function setDeslogin($deslogin){

		$this->deslogin = $deslogin;
	}

	public function getDessenha(){

		return $this->dessenha; 

	}

	public function setDessenha($dessenha){

		$this->dessenha = $dessenha;
	}

	/*public function exibir(){

		return array(
			"Nome: "=>$this->getNome(),
			"Login: "=>$this->getDeslogin(),
			"Senha: "=>$this->getDessenha()
		);
	}*/	

	
}

	/*$sup = new Supervisor();
	$sup->SetNome("Aderbal de Oliveira Yamamoto");
	$sup->setDeslogin("aderbal");
	$sup->setDessenha("123456");

	var_dump($sup->exibir());*/

?>

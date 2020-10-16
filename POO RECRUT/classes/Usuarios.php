<?php


class Usuarios{

	private $idusuario;
	private $nome;
	private $cpf;
	private $sexo;
	private $idade;
	private $endereco;
	private $email;
	private $telefone;
	private $cep;


	public function getIdusuario(){

		return $this->idusuario;

	}

	public function setIdusuario($value){

		$this->idusuario = $value;
	}

	public function getNome(){

		return $this->nome; 

	}

	public function setNome($nome){

		$this->nome = $nome;
	}

	public function getCpf(){

		return $this->cpf; 

	}

	public function setCpf($cpf){

		$this->cpf = $cpf;
	}	

	public function getSexo(){

		return $this->sexo; 

	}

	public function setSexo($sexo){

		$this->sexo = $sexo;
	}

	public function getIdade(){

		return $this->idade; 

	}

	public function setIdade($idade){

		$this->idade = $idade;
	}

	public function getEndereco(){

		return $this->endereco; 

	}

	public function setEndereco($endereco){

		$this->endereco = $endereco;
	}

	public function getEmail(){

		return $this->email; 

	}

	public function setEmail($email){

		$this->email = $email;
	}

	public function getTelefone(){

		return $this->telefone; 

	}

	public function setTelefone($telefone){

		$this->telefone = $telefone;
	}

	public function getCep(){

		return $this->cep; 

	}

	public function setCep($cep){

		$this->cep = $cep;
	}


// FUNÇÃO DE SELECT PARA MOSTRAR O USUÁRIO DE UM ID DETERMINADO 

		public function loadById ($id) {

		$sql = new Sql();
		
		$results = $sql->select("SELECT *FROM tb_usuarios WHERE idusuario =:ID", 
			array(":ID"=>$id));
		if (count($results)>0) {
			$this->setData($results[0]);
		}


	}



	public function setData($data){

			$this->setIdusuario($data['idusuario']);
			$this->setNome($data['nome']);
			$this->setIdade($data["idade"]);
			$this->setCpf($data['cpf']);
			$this->setSexo($data['sexo']);
			$this->setEndereco($data['endereco']);
			$this->setEmail($data['email']);
			$this->setTelefone($data['telefone']);
			$this->setCep($data['cep']);

		}

	public function __toString(){

		return json_encode(array(
			"idusuario:" =>$this->getIdusuario(),
			"Nome: "=>$this->getNome(),
			"Idade: "=>$this->getidade(),
			"CPF :"=>$this->getCpf(),
			"sexo: "=>$this->getSexo(),
			"Cep: "=>$this->getCep(),
			"Endereco: "=>$this->getEndereco(),
			"Email: "=>$this->getEmail(),
			"Telefone: "=>$this->getTelefone()
			
	));
}

}


?>

	
<?php
include("ClassConexao.php");

class ClassPessoa extends ClassConexao{

    public function cadastroPessoa($nome, $email, $telefone, $cpf)
    {
		$resposta = '';
		$BFetch=$this->conectaDB()->prepare("INSERT INTO cadastro (nome, email, telefone, cpf) values ('$nome', '$email', '$telefone', '$cpf');");
        $BFetch->execute() or $resposta= array('mensagem' => "erro");
		
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
		if($resposta == '')
		{
			$resposta= array('mensagem' => "sucesso");
		}
		echo json_encode($resposta);
      
    }
	public function buscaPessoa(){
		$BFetch=$this->conectaDB()->prepare("select * from cadastro");
        $BFetch->execute();

        $J=[];
        $I=0;

        while($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
            $J[$I]=[
                "id"=>$Fetch['id'],
                "nome"=>$Fetch['nome'],
                "email"=>$Fetch['email'],
                "telefone"=>$Fetch['telefone'],
				"cpf"=>$Fetch['cpf']
            ];
            $I++;
        }

        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
		header("Access-Control-Allow-Methods: POST");
		
		
        echo json_encode($J);

	}
	public function deletePessoa($id)
    {
		
		$BFetch=$this->conectaDB()->prepare("DELETE FROM cadastro WHERE id = $id;");
        $BFetch->execute() or die('erro');
		
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
		 header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
		
      
    }
}
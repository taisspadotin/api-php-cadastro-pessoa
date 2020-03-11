<?php
include("ClassConexao.php");

class ClassPessoa extends ClassConexao{

    public function cadastroPessoa($nome, $email, $telefone, $cpf)
    {
		
		$BFetch=$this->conectaDB()->prepare("INSERT INTO cadastro (nome, email, telefone, cpf) values ('$nome', '$email', '$telefone', '$cpf');");
        $BFetch->execute() or die('erro');
		
        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
		
      
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
		
        echo json_encode($J);

	}
}
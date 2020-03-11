<?php
 header("Access-Control-Allow-Origin: *");
#index.php
include("ClassPessoa.php");
$Pessoa=new ClassPessoa();


$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
	{
		case 'POST':
			$data = json_decode(file_get_contents("php://input"));
			//$nome, $email, $telefone, $cpf
			$Pessoa->cadastroPessoa($data->nome, $data->email, $data->telefone, $data->cpf);
			
		break;
		case 'GET':
			$data = json_decode(file_get_contents("php://input"));
			//$nome, $email, $telefone, $cpf
			$Pessoa->buscaPessoa();
			
		break;
	}

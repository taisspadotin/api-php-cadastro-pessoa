<?php
 header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
#index.php
include("ClassPessoa.php");
$Pessoa=new ClassPessoa();


$request_method=$_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"));
switch($request_method)
	{
		case 'POST':
			
			$Pessoa->cadastroPessoa($data->nome, $data->email, $data->telefone, $data->cpf);
		break;
		case 'GET':
			$Pessoa->buscaPessoa();
		break;
		case 'DELETE':
			$Pessoa->deletePessoa($_GET['id']);
		break;
	}

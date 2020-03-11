<?php
 header("Access-Control-Allow-Origin: *");
#index.php
include("ClassPessoa.php");
$Pessoa=new ClassPessoa();
$data = json_decode(file_get_contents("php://input"));
$Pessoa->cadastroPessoa($data->nome);
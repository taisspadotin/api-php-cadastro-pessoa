<?php
 header("Access-Control-Allow-Origin: *");
#index.php
include("ClassCarros.php");
$Carros=new ClassCarros();
$Carros->exibeCarros();
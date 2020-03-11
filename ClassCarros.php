<?php
include("ClassConexao.php");

class ClassCarros extends ClassConexao{

    #Exibição dos carros em um json
    public function exibeCarros()
    {
        $BFetch=$this->conectaDB()->prepare("select * from carros");
        $BFetch->execute();

        $J=[];
        $I=0;

        while($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
            $J[$I]=[
                "Id"=>$Fetch['Id'],
                "Marca"=>$Fetch['Marca'],
                "Modelo"=>$Fetch['Modelo'],
                "Ano"=>$Fetch['Ano']
            ];
            $I++;
        }

        header("Access-Control-Allow-Origin: *");
        header("Content-type: application/json");
		
        echo json_encode($J);
    }
}
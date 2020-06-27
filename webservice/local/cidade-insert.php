<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->nome) && isset($data->uf)){
      $query = __API::getInstance()->prepare("INSERT INTO `t_cidade` (`id`, `nome`, `uf`) VALUES (NULL, :nome, :uf);");
      $query->bindValue("nome",$data->nome);
      $query->bindValue("uf",$data->uf);
      $query->execute();
      __API::retornarJson(array("msg:" => "Cidade criada com sucesso.", "error" => false));
    }else
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    






     


?>
<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->id_cidade)){
      $query = __API::getInstance()->prepare("SELECT * FROM t_cidade WHERE id = :id");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->bindValue("id",$data->id_cidade);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array( "dados_cidade" => $query->fetch() ,"msg:" => "Cidades encontradas com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Nenhuma cidade encontrada.", "error" => true));
      }
    }else{
      $query = __API::getInstance()->prepare("SELECT * FROM t_cidade");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array( "dados_cidade" => $query->fetchAll() ,"msg:" => "Cidades encontradas com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Nenhuma cidade encontrada.", "error" => true));
      }
    }






     


?>
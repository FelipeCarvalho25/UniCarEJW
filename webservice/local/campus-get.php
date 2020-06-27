<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->id_campus)){
      $query = __API::getInstance()->prepare("SELECT * FROM t_campus_univali WHERE id = :id");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->bindValue("id",$data->id_campus);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array( "dados_campus" => $query->fetch() ,"msg:" => "Campus encontrados com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Nenhum campus encontrado.", "error" => true));
      }
    }else{
      $query = __API::getInstance()->prepare("SELECT * FROM t_campus_univali");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array( "dados_cidade" => $query->fetchAll() ,"msg:" => "Campus encontrados com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Nenhum campus encontrado.", "error" => true));
      }
    }






     


?>
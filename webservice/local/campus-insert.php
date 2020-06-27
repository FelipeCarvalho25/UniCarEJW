<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->id_cidade) && isset($data->rua) && isset($data->bairro) && isset($data->numero)){
      $query = __API::getInstance()->prepare("INSERT INTO `t_campus_univali` (`id`, `cidade_id`, `rua`, `bairro`, `numero`) VALUES (NULL, :id_cidade, :rua, :bairro, :numero);");
      $query->bindValue("id_cidade",$data->id_cidade);
      $query->bindValue("rua",$data->rua);
      $query->bindValue("bairro",$data->bairro);
      $query->bindValue("numero",$data->numero);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array("msg:" => "Campus criado com sucesso.", "error" => false));
      }
    }else
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    






     


?>
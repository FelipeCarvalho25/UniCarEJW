<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->id_viagem) && isset($data->id_user)){
      $query = __API::getInstance()->prepare("
        INSERT INTO `t_viagem_passageiro` (`id`, `id_viagem`, `id_user`) VALUES (NULL, :id_viagem, :id_user);
        INSERT INTO `t_user_viagem` (`id_user`,`id_viagem`) VALUES (:id_user, :id_viagem) ;");
      $query->bindValue("id_viagem",$data->id_viagem);
      $query->bindValue("id_user",$data->id_user);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array("msg:" => "Passageiro inserido com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Erro ao criar inserir passageiro.", "error" => true));
      }
    }else
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    






     


?>
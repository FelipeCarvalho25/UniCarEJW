<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->origem) && isset($data->destino) && isset($data->identificacao_campus)){
      $query = __API::getInstance()->prepare("SELECT t_viagem.*, (SELECT COUNT(id) FROM t_viagem_passageiro WHERE id_viagem = t_viagem.id) as passageiro_atual FROM t_viagem WHERE origem = :origem AND destino = :destino AND identificacao_campus = :identificacao_campus AND status = 'A'  ");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->bindValue("origem",$data->origem);
      $query->bindValue("destino",$data->destino);
      $query->bindValue("identificacao_campus",$data->identificacao_campus);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array("dados_viagem" => $query->fetchAll(),"msg:" => "Viagens encontradas com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Nenhuma viagem encontrada.", "error" => true));
      }
    }else if(isset($data->id_user)){
      $query = __API::getInstance()->prepare("SELECT t_viagem.*, (SELECT COUNT(id) FROM t_viagem_passageiro WHERE id_viagem = t_viagem.id) as passageiro_atual FROM t_viagem,t_user_viagem WHERE t_user_viagem.id_user = :id_user AND t_viagem.id = t_user_viagem.id_viagem ");
      $query->bindValue("id_user",$data->id_user);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array("dados_viagem" => $query->fetchAll(),"msg:" => "Viagens encontradas com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Nenhuma viagem encontrada.", "error" => true));
      }
    }else{
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    }
    






     


?>
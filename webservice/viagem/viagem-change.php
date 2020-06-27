<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->id_viagem) && isset($data->quant_passageiro) && isset($data->data_partida) && isset($data->origem) && isset($data->destino)&& isset($data->identificacao_campus)&& isset($data->status)){
      $query = __API::getInstance()->prepare("UPDATE `t_viagem` SET quant_passageiro = :quant_passageiro, data_partida = :data_partida, origem = :origem, destino = :destino, identificacao_campus = :identificacao_campus, status = :status WHERE id = :id_viagem");
      $query->bindValue("id_viagem",$data->id_viagem);
      $query->bindValue("quant_passageiro",$data->quant_passageiro);
      $query->bindValue("data_partida",$data->data_partida);
      $query->bindValue("origem",$data->origem);
      $query->bindValue("destino",$data->destino);
      $query->bindValue("identificacao_campus",$data->identificacao_campus);
      $query->bindValue("status",$data->status);
      $query->execute();
        __API::retornarJson(array("msg:" => "Viagem modificada com sucesso.", "error" => false));
    }else
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    






     


?>
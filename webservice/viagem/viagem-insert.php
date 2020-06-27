<?php

    include_once '../API_Config.php';

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->id_user_criacao) && isset($data->quant_passageiro) && isset($data->data_partida) && isset($data->origem) && isset($data->destino)&& isset($data->identificacao_campus)){
      $query = __API::getInstance()->prepare("INSERT INTO `t_viagem` (`id`, `id_user_criacao`, `quant_passageiro`, `data_criacao`, `data_partida`, `origem`, `destino`, `identificacao_campus`, `status`) VALUES (NULL, :id_user_criacao, :quant_passageiro, CURRENT_TIMESTAMP,:data_partida , :origem, :destino, :identificacao_campus, 'A');");
      $query->bindValue("id_user_criacao",$data->id_user_criacao);
      $query->bindValue("quant_passageiro",$data->quant_passageiro);
      //'2020-06-18 01:00:00'
      $query->bindValue("data_partida",$data->data_partida);
      $query->bindValue("origem",$data->origem);
      $query->bindValue("destino",$data->destino);
      $query->bindValue("identificacao_campus",$data->identificacao_campus);
      $query->execute();
      if($query->rowCount() > 0 ){
        $query = __API::getInstance()->prepare("SELECT id FROM t_viagem WHERE id_user_criacao = :id_user_criacao AND origem = :origem AND destino = :destino AND identificacao_campus = :identificacao_campus ORDER BY id DESC LIMIT 1");
        $query->bindValue("origem",$data->origem);
        $query->bindValue("destino",$data->destino);
        $query->bindValue("id_user_criacao",$data->id_user_criacao);
        $query->bindValue("identificacao_campus",$data->identificacao_campus);
        $query->execute();
        $id_viagem = $query->fetch()['id'];
        $query = __API::getInstance()->prepare("INSERT t_user_viagem (id_viagem,id_user) VALUES (:id_viagem,:id_user) ");
        $query->bindValue("id_viagem",$id_viagem);
        $query->bindValue("id_user",$data->id_user_criacao);
        $query->execute();
        __API::retornarJson(array("msg:" => "Viagem criada com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Erro ao criar viagem.", "error" => true));
      }
    }else
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    






     


?>
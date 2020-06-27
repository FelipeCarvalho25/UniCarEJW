<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->user_sender) && isset($data->user_receiver)){
      $query = __API::getInstance()->prepare("SELECT * FROM t_mensagem WHERE (user_sender = :user_sender AND user_receiver = :user_receiver ) OR (user_sender = :user_receiver AND user_receiver = :user_sender )  ");
      $query->bindValue("user_sender",$data->user_sender);
      $query->bindValue("user_receiver",$data->user_receiver);
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array("dados_msg" => $query->fetchAll(),"msg:" => "Mensagem recuperada com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Sem registros de mensagem.", "error" => true));
      }
    }else if(isset($data->user_sender)){
        $query = __API::getInstance()->prepare("SELECT * FROM t_mensagem WHERE user_sender = :user_sender ");
        $query->bindValue("user_sender",$data->user_sender);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        if($query->rowCount() > 0 ){
          __API::retornarJson(array("dados_msg" => $query->fetchAll(),"msg:" => "Mensagem recuperada com sucesso.", "error" => false));
        }else{
          __API::retornarJson(array( "msg" => "Sem registros de mensagem.", "error" => true));
        }
    }else if(isset($data->user_receiver)){
        $query = __API::getInstance()->prepare("SELECT * FROM t_mensagem WHERE user_receiver = :user_receiver ");
        $query->bindValue("user_receiver",$data->user_receiver);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        if($query->rowCount() > 0 ){
          __API::retornarJson(array("dados_msg" => $query->fetchAll(),"msg:" => "Mensagem recuperada com sucesso.", "error" => false));
        }else{
          __API::retornarJson(array( "msg" => "Sem registros de mensagem.", "error" => true));
        }
    }else{
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    }
    






     


?>
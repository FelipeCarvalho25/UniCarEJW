<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->msg) && isset($data->user_sender) && isset($data->user_receiver)){
      $query = __API::getInstance()->prepare("INSERT INTO `t_mensagem` (`id`, `user_sender`, `user_receiver`, `mensagem`, `data_enviada`) VALUES (NULL, :user_sender, :user_receiver, :msg, CURRENT_TIMESTAMP);");
      $query->bindValue("user_sender",$data->user_sender);
      $query->bindValue("user_receiver",$data->user_receiver);
      $query->bindValue("msg",$data->msg);
      $query->execute();
      if($query->rowCount() > 0 ){
        __API::retornarJson(array("msg:" => "Mensagem criada com sucesso.", "error" => false));
      }else{
        __API::retornarJson(array( "msg" => "Erro ao criar mensagem.", "error" => true));
      }
    }else
      __API::retornarJson(array( "msg" => "Algunas campos não foram informados.", "error" => true));
    






     


?>
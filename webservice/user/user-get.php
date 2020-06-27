<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->id)){
       $query = __API::getInstance()->prepare("SELECT * FROM t_user WHERE id = :id LIMIT 1");
       $query->bindValue("id"   ,$data->id);
       $query->setFetchMode(PDO::FETCH_ASSOC);
       $query->execute();
       if($query->rowCount() > 0 ){
          __API::retornarJson(array( "dados_user" => $query->fetch() ,"msg:" => "Usuário encontrado com suceeso.", "error" => false));
       }else{
          __API::retornarJson(array( "msg" => "Usuário não encontrado.", "error" => true));
       }
    }else{
        __API::retornarJson(array( "msg" => "Alguns campos não foram informados.", "error" => true));
    }





     


?>
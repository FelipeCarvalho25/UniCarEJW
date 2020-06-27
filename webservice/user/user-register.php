<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->email) && isset($data->nome) && isset($data->pass_w) && isset($data->idade) && isset($data->numero_telefone)){
       $query = __API::getInstance()->prepare("INSERT INTO `t_user` (`id`, `nome`, `pass_w`, `email`, `sobre`, `idade`, `numero`, `documentacao_enviada`, `curso`, `campus`, `foto`) VALUES (NULL, :nome, :pass_w, :email, NULL, :idade, :numero_telefone, 'N', NULL, NULL, NULL);");
       $query->bindValue("nome"   ,$data->nome);
       $query->bindValue("pass_w" ,$data->pass_w);
       $query->bindValue("email"  ,$data->email);
       $query->bindValue("idade"  ,$data->idade);
       $query->bindValue("numero_telefone"  ,$data->numero_telefone);
       $query->execute();
        __API::retornarJson(array( "msg:" => "Usuário criado com suceeso.", "error" => false));
    }else{
        __API::retornarJson(array( "msg" => "Alguns campos não foram informados.", "error" => true));
    }





     


?>
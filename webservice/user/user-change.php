<?php

    include_once '../API_Config.php';
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input')); 
    if(isset($data->email) &&isset($data->id)&&isset($data->sobre)&&isset($data->documentacao_enviada)&&isset($data->campus) &&isset($data->foto) &&isset($data->curso) && isset($data->nome) && isset($data->pass_w) && isset($data->idade) && isset($data->numero_telefone)){
       $query = __API::getInstance()->prepare("UPDATE `t_user` SET nome = :nome, pass_w = :pass_w, email = :email, sobre = :sobre, idade = :idade, numero = :numero, documentacao_enviada = :documentacao_enviada, curso = :curso, campus = :campus, foto = :foto WHERE id = :id");
       $query->bindValue("id"   ,$data->id);
       $query->bindValue("nome"   ,$data->nome);
       $query->bindValue("pass_w" ,$data->pass_w);
       $query->bindValue("email"  ,$data->email);
       $query->bindValue("idade"  ,$data->idade);
       $query->bindValue("sobre"  ,$data->sobre);
       $query->bindValue("documentacao_enviada"  ,$data->documentacao_enviada);
       $query->bindValue("campus"  ,$data->campus);
       $query->bindValue("foto"  ,$data->foto);
       $query->bindValue("curso"  ,$data->curso);
       $query->bindValue("numero"  ,$data->numero_telefone);
       $query->execute();
        __API::retornarJson(array( "msg:" => "Usuário alterado com suceeso.", "error" => false));
    }else{
        __API::retornarJson(array( "msg" => "Alguns campos não foram informados.", "error" => true));
    }





     


?>
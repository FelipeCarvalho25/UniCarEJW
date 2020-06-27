<?php

Class __API{

	private static $username = "root";
	private static $passw = "";
	private static $servidor = "localhost";
	private static $db = "db_unicar";
	private static $instance;

	/*
		FUNÇÃO PARA RETORNAR A INSTANCE DA CONEXÃO COM O BANCO DE DADOS.
	*/
	public static function getInstance(){

        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host='.self::$servidor.';
            dbname='.self::$db, self::$username, self::$passw,
 			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS,PDO::NULL_EMPTY_STRING);
        }
        
		return self::$instance;
	}


    public function retornarJson($json){
        echo json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }





}



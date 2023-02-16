<?php

class Db {

    private static $host = 'localhost';
    private static $usuario = 'root';
    private static $senha = '';
    private static $nomeDb = 'crud-php';

    public static function conecta() {

        try {
            $db = new PDO('mysql:host=localhost;dbname=crud-php', self::$usuario, self::$senha);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $exception){
            die("Erro: " . $exception->getMessage());
        }
    }

}
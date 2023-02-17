<?php

class Db {

    private static $host = '172.18.0.2';
    private static $usuario = 'user';
    private static $senha = 'root';
    private static $nomeDb = 'crud-php';

    public static function conecta() {

        try {
            $db = new PDO('mysql:host=' . self::$host . ';dbname=crud-php', self::$usuario, self::$senha);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $exception){
            die("Error: " . $exception->getMessage());
        }
    }

}
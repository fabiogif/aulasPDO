<?php

class Conexao
{
    public static function chamarConexao()
    {
        $conexao = new PDO(DB_DRIVER . ':host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

        //Error Handling
        //PDO::ERRMODE_SILENT: Just set error codes.
        //PDO::ERRMODE_WARNING: Raise E_WARNING.
        //PDO::ERRMODE_EXCEPTION: Throw exceptions.

        return $conexao;
    }


    public static function disconnect()
    {
    }
}

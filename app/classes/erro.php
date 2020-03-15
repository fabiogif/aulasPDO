<?php
class Erro
{
    public static  function trataError(Exception $ex)
    {
        if (DEBUG) {
            echo '<pre>';
            print_r($ex->getMessage());
            echo '</pre>';
        } else {
            echo $ex->getMessage();
        }
    }
}

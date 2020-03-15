<?php
require_once 'classes/config.php';

spl_autoload_register('carregarClasse');

function carregarClasse($classe)
{
    if (filesize('classes/' . $classe . '.php')) {
        require_once 'classes/' . $classe . '.php';
    }
}

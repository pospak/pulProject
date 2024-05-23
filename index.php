<?php
mb_internal_encoding("UTF-8");

function autoloadFunction(string $class): void
{
    // Končí název třídy řetězcem "Kontroler" ?
    if (preg_match('/Controler$/', $class)) {
        require("controlers/" . $class . ".php");
    } else {
        require("models/" . $class . ".php");
    }
}

spl_autoload_register("autoloadFunction");



$router = new RouterControler();
$router->process(array($_SERVER['REQUEST_URI']));
$router->viewListing();
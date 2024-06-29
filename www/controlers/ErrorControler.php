<?php

class ErrorControler extends Controler
{
    public function process(array $parameters): void
    {
    // Hlavička požadavku
    header("HTTP/1.0 404 Not Found");
    // Hlavička stránky
    $this->head['title'] = 'Chyba 404';
    // Nastavení šablony
    $this->view = 'error';
    }
}
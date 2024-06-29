<?php

class E504Controler extends Controler
{
    public function process(array $parameters): void
    {
    // Hlavička požadavku
    header("HTTP/1.0 504 Gateway Timeout");
    // Hlavička stránky
    $this->head['title'] = 'Chyba 504';
    // Nastavení šablony
    $this->view = '504';
    }
}
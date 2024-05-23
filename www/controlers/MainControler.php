<?php

class MainControler extends Controler
{
    public function process(array $parameters): void
    {
        $this->head = array(
            "title" => "Křižovatka",
            "keywords" => "PUL, Škípa-Is, PospakTube, PospakLyrics, MIMAJSPO Create, CitrakStrava, POSPÁK 65",
            "description" => "Bezpečné přihlášení se systémem PUL"
        );
        $this->view = "main";
    }
}
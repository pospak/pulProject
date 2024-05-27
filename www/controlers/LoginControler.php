<?php

class LoginControler extends Controler {
    public function process(array $parameters): void
    {
        $this->head = array(
            "title" => "Přihlášení",
            "keywords" => "PUL, Škípa-Is, PospakTube, PospakLyrics, MIMAJSPO Create, CitrakStrava, POSPÁK 65",
            "description" => "Bezpečné přihlášení se systémem PUL"
        );

        $url = $parameters[0];
        switch ($url){
            case "pospakTube":
                $this->view = "login";
                $login = new Login();
            
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    if ($login->PospakTube($username, $password)){
                       header("Location: http://pospaktube.batcave.net/logged/$username");
                       session_start();
                          $_SESSION["logged"] = $username;
                        $_SESSION["password"] = $password;
                    } else {
                      echo "<script>alert('Nesprávné jméno nebo heslo')</script>";
                    }
               
        }
    }
}
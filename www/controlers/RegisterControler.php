<?php
class RegisterControler extends Controler
{
    public function process(array $parameters): void
    {
        $this->head = array(
            "title" => "Registrace",
            "keywords" => "PUL, Škípa-Is, PospakTube, PospakLyrics, MIMAJSPO Create, CitrakStrava, POSPÁK 65",
            "description" => "Bezpečná registrace do systému PUL"
        );
        $url = $parameters[0];
        $this->data["url"] = $url;

        switch ($url){
            case "pospakTube":
                $this->view = "register";
                if(isset($_POST["submit"])){
                    $register = new Register();
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];
                    $reg = $register->PospakTube($username, $password, $email);
                    if ($reg){
                        echo "<script>alert('Registrace proběhla úspěšně! Teď prosím zkontroluj svůj email a ověř svůj účet pomocí odkazu který ti přišel... (Pokud byl podle tvého emailu rozpoznán jeho poskytovatel, budeš po zavření tohoto upozornění automaticky přesměrován na jeho stránku)')</script>";
                        EmailRedirect::redirectByEmailProvider($email);
                    } else {
                        echo "<script>alert('Registrace se nezdařila')</script>";
                    }
                }
                break;
        }
    }
}

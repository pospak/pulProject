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
                    if ($reg!=false){
                        function redirectByEmailProvider($email) {
                            $emailProviders = array(
                              "email.cz" => "https://email.cz",
                              "seznam.cz" => "https://email.cz",
                              "gmail.com" => "https://mail.google.com",
                              "outlook.com" => "https://outlook.live.com",
                              "hotmail.com" => "https://outlook.live.com",
                              "skaut.cz" => "https://mail.google.com"
                            );
                  
                            $parts = explode("@", $email);
                            $lastPart = end($parts);
                  
                            if (array_key_exists($lastPart, $emailProviders)) {
                              $redirectUrl = $emailProviders[$lastPart];
                            } else {
                              $redirectUrl = "/main";
                            }
                  
                            echo "<meta http-equiv='refresh' content='0;url=$redirectUrl'>";
                        }
                        echo "<script>alert('Registrace proběhla úspěšně! Teď prosím zkontroluj svůj email a ověř svůj účet pomocí odkazu který ti přišel...')</script>";
                        redirectByEmailProvider($email);
                    } else {
                        echo "<script>alert('Registrace se nezdařila')</script>";
                    }
                }
                break;
        }
    }
}

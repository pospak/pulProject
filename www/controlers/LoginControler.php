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
        $this->data["url"] = $url;
        switch ($url){
            case "pospakTube":
                $this->view = "login";
                if(isset($_POST["submit"])){
                $login = new Login();
            
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $targetID = $login->PospakTube($username);
                    if ($targetID!=false){
                        $id = $targetID["target"];
                        $passwordFromDB = $targetID["password"];
                        if (password_verify($password, $passwordFromDB)){
                        if($targetID["verify"]==0){
                            echo "<script>('Tvůj email dosud nebyl ověřen! Než budeš moct pokračovat zkontroluj emailovou schránku a ověř si jej pomocí odkazu, který ti přišel v uvítací zprávě. (Pokud byl podle tvého emailu rozpoznán jeho poskytovatel, budeš po zavření tohoto upozornění automaticky přesměrován na jeho stránku)')</script>";
                            EmailRedirect::redirectByEmailProvider($targetID["email"]);
                        }else{
                            header("Location: http://pospaktube.batcave.net/login/$id");
                        }
                     
                        } else {
                          echo "<script>alert('Nesprávné heslo')</script>";
                        }
                    } else {
                      echo "<script>alert('Uživatel nenalezen!')</script>";
                    }
                }
                break;
            case "pospakLyrics":
                break;
               
        }
    }
}
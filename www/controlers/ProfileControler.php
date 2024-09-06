<?php


class ProfileControler extends Controler
{
    public function process(array $parameters): void
    {
        $this->head = array(
            "title" => "Profil",
            "keywords" => "PUL, Škípa-Is, PospakTube, PospakLyrics, MIMAJSPO Create, CitrakStrava, POSPÁK 65",
            "description" => "Profilová stránka"
        );
        $this->view = "profile";
        $url = $parameters[0];
        $this->data["url"] = $url;
        $target = $parameters[1];
        switch ($url){
            case "pospakTube":
               $connection = Database::getConnection();
            $stmt = $connection->prepare("SELECT * FROM PospakTubeUsers WHERE target = ?");
            $stmt->bind_param("i", $target);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $this->data["data"] = $row;
               
           
        
                break;
            case "pospakLyrics":
                break;
        }
    }
}

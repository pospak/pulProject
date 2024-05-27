<?php

class UpdateControler extends Controler
{
    public function process(array $parameters): void
    {
        $url = $parameters[0];
        $connection = Database::getConnection();
        $stmt = $connection->prepare("UPDATE PospakTubeUsers SET targetID = ? WHERE targetID = ?");
        $stmt->bind_param("ii", $url, 552);
        $stmt->execute();
        echo "<script>alert('Registrace proběhla úspěšně')</script>";
        header("Location: /login/pospakTube");
    }
}

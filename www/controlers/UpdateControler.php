<?php

class UpdateControler extends Controler
{
    public function process(array $parameters): void
    {
        $username = $parameters[0];
        $id = $parameters[1];
        $connection = Database::getConnection();
        $stmt = $connection->prepare("UPDATE PospakTubeUsers SET target = ? WHERE username = ?");
        $stmt->bind_param("is", $id,$username);
        $stmt->execute();
        echo "<script>alert('Registrace proběhla úspěšně')</script>";
        header("Location: http://pospaktube.batcave.net/");
    }
}

<?php

class EmailVerifyControler extends Controler
{
    public function process(array $parameters):void
    {
    
        $email = $parameters[0];
        $connection = new mysqli("localhost","us011718","MP838IT356","db011718");
        $stmt = $connection->prepare("UPDATE PospakTubeUsers SET verify = 1 WHERE email = ?");
        $stmt2 = $connection->prepare("SELECT username FROM PospakTubeUsers WHERE email = ?");
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $username = $stmt2->get_result();
        $stmt->bind_param("s", $email);
        $stmt->execute();
        echo "<script>alert('Email byl úspěšně ověřen!')</script>";
        echo "<script>window.location.href = 'http://pospaktube.batcave.net/register/$username'</script>";
    
    }
    
}

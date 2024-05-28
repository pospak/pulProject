
<?php

class Register{
    public static function PospakTube($username, $password, $email) {
        $connection = Database::getConnection();
        $sql = "INSERT INTO PospakTubeUsers (username, password, email) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $username, password_hash($password, PASSWORD_DEFAULT), $email);
        $stmt->execute();
    

    $from = "PospakTube Auto Messaging system <no-reply@pul.skauting.cz>";
        $message = file_get_contents('/mail_template.php');
        emailSender::send($email, "Registrace do PospakTube", $message, $from);
        return true;
     
    }
    public static function PospakLyrics($username, $password,$email) {
        
    }
    public static function MIMAJSPOCreate($username, $password,$email) {
        
    }

}
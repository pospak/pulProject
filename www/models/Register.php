
<?php

class Register{
    public static function PospakTube($username, $password, $email) {
        $connection = new mysqli("localhost","us011718","MP838IT356","db011718");
        $sql = "INSERT INTO PospakTubeUsers (username, password, email) VALUES (?, ?, ?)";
        $stmt = $connection->prepare("INSERT INTO PospakTubeUsers (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, password_hash($password, PASSWORD_DEFAULT), $email);
        $stmt->execute();
    

        ob_start();

        // Načtení obsahu šablony
        include 'mail_template.php';
        
        // Získání obsahu šablony do proměnné $message
        $message = ob_get_clean();
        
        // Definování odesílatele
        $from = "PospakTube Auto Messaging system <no-reply@pul.skauting.cz>";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // Hlavička From
        $headers .= "From: " . $from . "\r\n";
        mail($to, $subject, $message, $headers);
        return true;
     
    }
    public static function PospakLyrics($username, $password,$email) {
        
    }
    public static function MIMAJSPOCreate($username, $password,$email) {
        
    }

}
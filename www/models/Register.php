
<?php

class Register{
    public static function PospakTube($username, $password, $email) {
        $connection = Database::getConnection();
        $sql = "INSERT INTO PospakTubeUsers (targetID, username, password, email) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("isss",552, $username, password_hash($password, PASSWORD_DEFAULT), $email);
        $stmt->execute();
        $result= $stmt->get_result();
if($result->num_rows>0){
    $from = "PospakTube Auto Messaging system <no-reply@pul.skauting.cz>";
        $message = file_get_contents('/mail_template.php');
        emailSender::send($email, "Registrace do PospakTube", $message, $from);
        return true;
}else{
    return false;
}
        
    }
    public static function PospakLyrics($username, $password,$email) {
        
    }
    public static function MIMAJSPOCreate($username, $password,$email) {
        
    }

}
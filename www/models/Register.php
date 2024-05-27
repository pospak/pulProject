<?php

class Register{
    public static function PospakTube($username, $password, $email) {
        $connection = Database::getConnection();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO PospakTubeUsers (targetID, username, password, email) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $username, $password, $email,552);
        $stmt->execute();
        return true;
    }
    public static function PospakLyrics($username, $password,$email) {
        
    }
    public static function MIMAJSPOCreate($username, $password,$email) {
        
    }

}
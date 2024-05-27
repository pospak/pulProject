<?php

class Register{
    public static function PospakTube($username, $password, $email) {
        $connection = Database::getConnection();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO PospakTubeUsers (username, password, email, profilePhotom, targetID) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $profilePhoto = "/images/profilePhotos/logo.png";
        $stmt->bind_param("ssssi", $username, $password, $email,$profilePhoto, 552);
        $stmt->execute();
        return true;
    }
    public static function PospakLyrics($username, $password,$email) {
        
    }
    public static function MIMAJSPOCreate($username, $password,$email) {
        
    }

}
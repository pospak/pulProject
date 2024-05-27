<?php
class Login{
    public static function PospakTube($username, $password) {
        $connection = Database::getConnection();
        $sql = "SELECT * FROM PospakTubeUsers WHERE username = ? AND password = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            return $row["targetID"];
        } else {
            return false;
        }
    }
    public static function PospakLyrics($username, $password) {
        
    }
    public static function MIMAJSPOCreate($username, $password) {
        
    }
    public static function CitrakStrava($username, $password) {
        
    }
    public static function skipaIs($username, $password) {
        
    }
}
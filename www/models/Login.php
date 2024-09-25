<?php
class Login{
    public static function PospakTube($username) {
        $connection = Database::getConnection();
        $sql = "SELECT * FROM PospakTubeUsers WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
    public static function skipaIs($username) {
        $connection = new mysqli("localhost", "us011225","Skorpik444","db011225");
        $sql = "SELECT * FROM skipaUsers WHERE username = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();	
        $row = $result->fetch_assoc();
        if ($row){
            return $row;
        }else{
            return false;
        }
    }
}
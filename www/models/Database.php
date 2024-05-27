<?php

class Database
{
    public static function getConnection(){
        return new mysqli("","us011718","MP838IT356","db011718");
    }
}

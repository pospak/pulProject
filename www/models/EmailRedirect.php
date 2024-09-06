<?php

class EmailRedirect
{
    public static function redirectByEmailProvider($email) {
        $emailProviders = array(
          "email.cz" => "https://email.cz",
          "seznam.cz" => "https://email.cz",
          "gmail.com" => "https://mail.google.com",
          "outlook.com" => "https://outlook.live.com",
          "hotmail.com" => "https://outlook.live.com",
          "skaut.cz" => "https://mail.google.com"
        );

        $parts = explode("@", $email);
        $lastPart = end($parts);

        if (array_key_exists($lastPart, $emailProviders)) {
          $redirectUrl = $emailProviders[$lastPart];
        } else {
          $redirectUrl = "/main";
        }

        echo "<meta http-equiv='refresh' content='0;url=$redirectUrl'>";
    }
}

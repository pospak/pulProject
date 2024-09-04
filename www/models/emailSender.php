<?php

class emailSender
{
   public static function send(string $to, string $subj, string $message, string $from): bool
    {
        $header = "From: ".$from;
        $header .="\nMime-version: 1.0\n";
        $header .= "Content-Type: text/html; charset = UTF-8\n";
        return mb_send_mail($to,$subj,$message,$header); 
    }
}

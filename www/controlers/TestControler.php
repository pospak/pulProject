<?php

class TestControler extends Controler
{
    
    function process(array $parameters):void
    {
        
            $connection =  mysqli_connect("fdb1031.batcave.net","4410028_lyrics","Pospak444","4410028_lyrics");
//$url = $parameters[0];
$query = "SELECT * FROM lyrics";

$merge = mysqli_query($connection, $query);

$results = mysqli_fetch_all($merge, MYSQLI_ASSOC);

if (!empty($results)) {
    $this->view = "test";

    $this->head = array(
        "title" => "Úvod", // Použij prvního umělce pro titulek
        "description" => "Úvodní stránka",
        "keywords" => ""
    );

    $this->data["artists"] = $results;
} else {
    $this->view = 'error';
}
    }
}
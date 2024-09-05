<?php

class IdControler extends Controler
  {
    public function process(array $parameters):void
    {
     
      $id = $parameters[0];
      $username = $parameters[1];

      $connection = new mysqli("localhost","us011718","MP838IT356","db011718");
      $stmt = $connection->prepare("UPDATE PospakTubeUsers SET target = ? WHERE username = ?");
      $stmt->bind_param("ss",$id,$username);
      $stmt->execute();

      header("Location: http://pospaktube.batcave.net/main");

    }

  }

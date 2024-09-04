
<?php

class Register{
    public static function PospakTube($username, $password, $email) {
        $connection = new mysqli("localhost","us011718","MP838IT356","db011718");
        $sql = "INSERT INTO PospakTubeUsers (username, password, email) VALUES (?, ?, ?)";
        $stmt = $connection->prepare("INSERT INTO PospakTubeUsers (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, password_hash($password, PASSWORD_DEFAULT), $email);
        $stmt->execute();
    

        // Získání obsahu šablony do proměnné $message
        $message = "<main>
        <h1>Díky za registraci</h1>
        <p>Děkuju moc za registraci na webu PospakTube</p>
        <p>Od možnosti používat tenhle web naplno tě už dělí jenom poslední věc - oěření emailu.</p>
        <p>To provedeš kliknutím na následující tlačítko:</p>
        <br><br><br>
        <a href='https://pul.skauting.cz/email-verify/<?=$email?>' class='links'>Ověřit</a><br><br>
    <strong>
        S Pozdravem POSPÁK 65
    </strong>
    </main>
    <br clear='both' />
        <footer>
            <p>POSPAK's Universal Login | &copy; 2024</p>
        </footer>
    </body>
    </html>";
        
        // Definování odesílatele
        $from = "PospakTube Auto Messaging system <no-reply@pul.skauting.cz>";
        
     
        
        // Hlavička From
     emailSender::send($email, "Děkujeme za registraci", $message, $from);
       
        return true;
     
    }
    public static function PospakLyrics($username, $password,$email) {
        
    }
    public static function MIMAJSPOCreate($username, $password,$email) {
        
    }

}
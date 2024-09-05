
<?php

class Register{
    public static function PospakTube($username, $password, $email) {
        $connection = new mysqli("localhost","us011718","MP838IT356","db011718");
        $sql = "INSERT INTO PospakTubeUsers (username, password, email) VALUES (?, ?, ?)";
        $stmt = $connection->prepare("INSERT INTO PospakTubeUsers (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, password_hash($password, PASSWORD_DEFAULT), $email);
        $stmt->execute();
    

        // Získání obsahu šablony do proměnné $message
        $message = "<!DOCTYPE html>
        <html lang='cs-cz'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <style>
           *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }
        
        :root{
            --bg-color: #fff;
            --text-color: #000;
        }
        header{
            background: rgba(255, 255, 255, 0.2); /* Průhledné bílé pozadí */
            backdrop-filter: blur(10px); /* Rozmazání pozadí */
            -webkit-backdrop-filter: blur(10px); /* Rozmazání pozadí pro Safari */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Jemný bílý okraj */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Lehký stín */
            border-radius: 10px; /* Zaoblené rohy */
            padding: 20px; /* Vnitřní odsazení */
            color: #fff; /* Bílý text */
        }
        
        body{
            color: white;
        }
        
        [data-theme=dark] {
        
            --all-bg: #000;
            --all-color: #fff;
            
           }
        
        body{
           background-color: #000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        
        
        
        .mainTitle{
            text-align: center;
        }
        
        
        .mainTitle::after{
            content: '';
            display: block;
            width: 210.0252423px;
            height: 2px;
            background-color: #02f869;
            margin: 10px auto;
        }
        
        h2{
            font-size: 2rem;
            margin: 20px 0;
        
        }
        
        a, .links{
            text-decoration: none;
            color: white;
        }
        
        .links:hover{
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #02f869;
            background-color: #02f869;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        
        
        .smallLink::before{
            content: '';
            display: block;
            width: 150.0252423px;
            height: 2px;
            background-color: #02f869;
            margin: 10px auto;
        }
        
        /************footer**************/
        .footer {
            background: rgba(255, 255, 255, 0.2); /* Průhledné bílé pozadí */
            backdrop-filter: blur(10px); /* Rozmazání pozadí */
            -webkit-backdrop-filter: blur(10px); /* Rozmazání pozadí pro Safari */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Jemný bílý okraj */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Lehký stín */
            border-radius: 10px; /* Zaoblené rohy */
            padding: 20px; /* Vnitřní odsazení */
            color: #fff; /* Bílý text */
            
        }
        
        .bg{
            background: var(--gradient);
            border-radius: 10px;
            margin: 0 auto;
            display: block;
        }
        
        .footer::after{
            content: '©POSPAK 65 2024';
            display: block;
            color: white;
            width: auto;
            height: auto;
            background: transparent;
            top: 5px;
            margin: 0 auto;
        }
        
        .social-links {
            margin-bottom: 10px;
        }
        
        .social-icon {
            display: inline-block;
            margin: 0 10px;
            width: 32px;
            height: 32px;
        }
        
        /* .footer-text {
            font-size: 0.8rem;
            margin-top: 10px;
            color: white;
        } */
        
        main{
            background: rgba(255, 255, 255, 0.2); /* Průhledné bílé pozadí */
            backdrop-filter: blur(10px); /* Rozmazání pozadí */
            -webkit-backdrop-filter: blur(10px); /* Rozmazání pozadí pro Safari */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Jemný bílý okraj */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Lehký stín */
            border-radius: 10px; /* Zaoblené rohy */
            padding: 20px; /* Vnitřní odsazení */
            color: #fff; /* Bílý text */
        }
        
        
        /***********************************************/ 
        </style>
        </head>
        <body>
            <header>
           
                    <a href='http://pospaktube.batcave.net/main'>
                        <h1 class='mainTitle'>
                            PospakTube
                        </h1>
                        <h3>
                            Be closer to POSPAK's videos
                        </h3>
                        <small class='smallLink'>
                            Site by POSPÁK 65
                        </small>
                    </a>
                        
            </header>
            <br clear='both' />
            <main>
            <h1>Díky za registraci</h1>
            <p>Děkuju moc za registraci na webu PospakTube</p>
            <p>Od možnosti používat tenhle web naplno tě už dělí jenom poslední věc - oěření emailu.</p>
            <p>To provedeš kliknutím na následující tlačítko:</p>
            <br><br><br>
            <a href='https://pul.skauting.cz/email-verify/$email' class='links'>Ověřit</a><br><br>
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
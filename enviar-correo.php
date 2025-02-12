<?php
require_once './PHPMailer/Exception.php';
require_once './PHPMailer/PHPMailer.php';
require_once './PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$robot = $_POST['robot'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$producto = $_POST['producto'];
$mensaje = $_POST['mensaje'];

if($robot == 4){

    $mensaje = "
    <!DOCTYPE html>
    <html lang='en'>
    
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    
    <body>
        <style type='text/css'>
            .contenedor {
                max-width: 1200px;
                margin: 0 auto;
            }
            
            body {
                font-family: 'Changa', sans-serif;
                font-weight: 200;
                line-height: 1.7;
            }
            
            a {
                color: black;
                text-decoration: none;
                font-weight: 400;
            }
            
            h1 {
                font-weight: 200;
                font-size: 30px;
            }
            
            h3 {
                font-weight: 200;
                font-size: 24px;
            }
            
            span {
                font-family: 'Changa', sans-serif;
                font-weight: 200;
                color: rgb(0, 60, 255);
            }
            
            .logo img {
                width: 20rem;
                margin: 0;
            }
            
            #mayus {
                text-transform: uppercase;
            }
            
            .centrar-texto {
                text-align: center;
            }
            
            .flex {
                display: flex;
                justify-content: space-between;
            }
            
            .cuadros-opciones {
                padding: 1rem;
                box-shadow: 1px 1px 3px rgb(224, 224, 224);
            }
            
            .btn-general {
                background-color: rgb(35, 35, 220);
                padding: 1rem;
                border-radius: 1rem;
                border: none;
                color: white;
                margin: 10px 0;
                display: inline-block;
            }
            
            @media (min-width: 950px) {
                .dividir {
                    display: flex;
                    justify-content: space-between;
                    flex-wrap: wrap;
                }
                .dos-partes {
                    flex-basis: calc(50% - 2rem);
                }
                .tres-partes {
                    flex-basis: calc(33.3% - 2rem);
                }
            }
            
            .border-bottom {
                border-bottom: 1px solid rgb(208, 208, 208);
                max-width: 90%;
                width: 80%;
                display: inline-block;
            }
        </style>
        <div class='contenedor'>
            <div class='flex centrar-texto'>
                <div class='dos-partes'>
                    <a href='http://www.sopleteorca.com' target='_blank' rel='noopener noreferrer'>Inicio</a>
                </div>
                <div class='dos-partes'>
                    <a href='http://www.sopleteorca.com/nosotros.php' target='_blank' rel='noopener noreferrer'>Saber Más</a>
                </div>
            </div>
            <div class='centrar-texto logo'>
                <h1>
                    <a href='http://www.sopleteorca.com' target='_blank' rel='noopener noreferrer'>Sopleteorca.com</a>
                </h1>
            </div>
            <p>Hola, el usuario <span> $nombre </span> se ha comunicado con nosotros desde la página <strong>sopleteorca.com</strong></h3>
                <div class='dividir'>
                    <div class='dos-partes'>
                        <div class='cuadros-opciones'>
                            <p class='centrar-texto' id='mayus'> <span> $nombre </span> </p>
                            <span>Mensaje:</span>
                            <br>
                            <p>$mensaje</p>
                            <span>Producto: </span>
                            <p>$producto</p>
                        </div>
                    </div>
    
                    <div class='dos-partes'>
                        <div class='cuadros-opciones'>
                            <p class='centrar-texto' id='mayus'>DATOS DEL USUARIO</p>
                            <br>
                            <p>Si desea responder el mensaje, $nombre proporciono los siguientes datos:</p>
                            <p>Correo Electrónico: <span> $email </span></p>
                            <p>Número Telefónico: <span> $telefono </span></p>
                        </div>
                    </div>
                </div>
               
                <div class='centrar-texto'>
                    <div class='border-bottom'></div>
                </div>
                <p class='centrar-texto'><strong><a href='http://www.sopleteorca.com' target='_blank' rel='noopener noreferrer'>sopleteorca.com</a> </strong> <span id='date'></span> Todos los derechos reservados. Design: JAAC
    
                </p>
    
        </div>
    </body>
    <script>
        n = new Date();
        //Año
        y = n.getFullYear();
        //Mes
        m = n.getMonth() + 1;
        //Día
        d = n.getDate();
    
        //Lo ordenas a gusto.
        document.getElementById('date').innerHTML = y;
    </script>
    
    </html>        
    
    ";
    $mail = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->CharSet = 'UTF-8'; //This comand acept charchter alphanumeric
    $mail->Host = "ns56.hostgator.mx";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true); //Active HTML
    $mail->Username = "contacto@sopletesorca.com"; //User or count primary
    $mail->Password = "Contact@2021"; //Password the count
    $mail->SetFrom("contacto@sopletesorca.com"); //Email main
    $mail->Subject = "Mensaje de Usuario de la página sopletesorca.com"; //Title of the message
    $mail->Body = $mensaje; //Message 
    $mail->AddAddress("informes@prasadam.mx"); //Email the second person
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo; //Message if exist error 
    } else {
        header("Location: index.html");
    }

}else{
    header("Location: contacto-error.html");
}
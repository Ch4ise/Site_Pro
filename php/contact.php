<?php

    echo("<article id='form-article'>");

    echo("<div class='contact-container'>
                <div class='contact-container-left'>
                    <h2>N'hésitez pas à me contacter !</h2>
                    <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2600.3413612478207!2d-0.3984980841501391!3d49.32675567556768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480a5f010bac41bb%3A0x2cb1a5fb1ceef5aa!2s16%20Rue%20de%20la%20Passe%20d&#39;Aval%2C%2014750%20Saint-Aubin-sur-Mer!5e0!3m2!1sfr!2sfr!4v1640183326258!5m2!1sfr!2sfr' width='80%' height='80%' style='border: 5px solid white;'' allowfullscreen='' loading='lazy'></iframe>
                </div>")  ; 

    echo(   "<div class='contact-container-right'>
                <form action='' method='POST'>
                        <p>Nom*</p>
                        <input type='text' class='contact-square' name='nom' placeholder='Entrez votre nom...' required='required'>
                        <p>E-mail*</p>
                        <input type='mail' class='contact-square' name='email' placeholder='Entrez votre e-mail...' required='required'>
                        <p>Objet*</p>
                        <input type='text' class='contact-square' name='objet' placeholder='Entrez votre objet...' required='required'>
                        <p>Contenu du mail</p>
                        <textarea class='contact-message' name='mess' placeholder='Entrez votre commentaire'></textarea><br>
                        <input type='submit' id='submit' value='Valider' />
                    </form>
                    <div class='h-captcha' data-sitekey='ccf9b1e1-9657-4a46-a4fa-92d88f3405e7'></div>
            </div>
        </div>
    </article>");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

include_once 'phpmailer/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    if( !empty($_POST)){

        if(isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response']))
        {
              $secret = '0x5Eb539ede9ec6A525e2478BC54faef86c116781C';
              $verifyResponse = file_get_contents('https://hcaptcha.com/siteverify?secret='.$secret.'&response='.$_POST['h-captcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR']);
              $responseData = json_decode($verifyResponse);
              if($responseData->success)
              {
                  $succMsg = 'Your request have submitted successfully.';

                  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                  try {
                      //Server settings
                      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                      $mail->isSMTP();                                      // Set mailer to use SMTP
                      $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
                      $mail->SMTPAuth = true;                               // Enable SMTP authentication
                      $mail->Username = 'webbenoit.bronsard@gmail.com';             // SMTP username
                      $mail->Password = 'WEB02Aout2003ben!!';                           // SMTP password
                      $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
                      $mail->Port = 465;                                    // TCP port to connect to
          
                      //Recipients
                      $mail->setFrom($_POST['email']);          //This is the email your form sends From
                      $mail->addAddress('webbenoit.bronsard@gmail.com'); // Add a recipient address
                      $mail->isHTML(true);                                  // Set email format to HTML
                      $mail->Subject = $_POST['objet'];
                      $mail->Body    = $_POST['mess']."<br>"." mail de l'expéditeur : ".$_POST['email'];
                      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          
                      $mail->send();
                      echo '<div><h2>Votre message à bien été envoyé</h2></div>';
                  } catch (Exception $e) {
                      echo 'Votre message à pas pu être envoyé.';
                      echo 'Mailer Error: ' . $mail->ErrorInfo;
                  }
              }
              else
              {
                  $errMsg = 'Robot verification failed, please try again.';
              }
         }
    }
?>

<?php

echo '<main class="wrappercp">';
    echo'<div class="contact2">';
        echo '<h2>titre</h2>';
        echo'<form action="index.php#contact" method="post">';
            echo'<p>nom</p>';
            echo'<input class="champ2" type="text" name="nom" placeholder="Entrez votre nom de famille">';
            echo'<p>mail</p>';
            echo '<input class="champ2" type="email" name="email" placeholder="Entrez l\'email ">';
            echo '<p>objet</p>';
            echo'<input class="champ2" type="text" name="objet" placeholder="Entrez l\'objet ">';
            echo'<p>contenu</p>';
            echo'<textarea rows="8" cols="81" name="form" placeholder="Entrez le contenu de votre mail"></textarea>';
            echo'<br>';
            echo'<div class="h-captcha" data-sitekey="ccf9b1e1-9657-4a46-a4fa-92d88f3405e7"></div>';
            echo'<input class="champ" type="submit" value="Envoyez">';
        echo'</form>';
    echo'</div>';
echo'</main>';   

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
                      $mail->Body    = $_POST['form']."<br>"." mail de l'expéditeur : ".$_POST['email'];
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

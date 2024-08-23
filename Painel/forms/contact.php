<?php
// Substitua contact@example.com pelo seu verdadeiro endereço de e-mail de recebimento
$receiving_email_address = 'gabrielfariadossantos1382007@gmail.com';

$from_name = isset($_POST['name']) ? $_POST['name'] : '';
$from_email = isset($_POST['email']) ? $_POST['email'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

$headers = "From: $from_name <$from_email>\r\n";
$headers .= "Reply-To: $from_email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

if(mail($receiving_email_address, $subject, $message, $headers)) {
  echo 'success';
} else {
  echo 'error';
}
?>
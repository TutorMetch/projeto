<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'pbraz0460@gmail.com';

  $receiving_email_address = 'pbraz0460@gmail.com';

  $from_name = $_POST['nome'];
  $from_email = $_POST['email'];
  $subject = $_POST['assunto'];
  $message = $_POST['mensagem'];

  $headers = "From: $from_name <$from_email>\r\n";
  $headers .= "Reply-To: $from_email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  if(mail($receiving_email_address, $subject, $message, $headers)) {
    echo 'success';
  } else {
    echo 'error';
  }
?>
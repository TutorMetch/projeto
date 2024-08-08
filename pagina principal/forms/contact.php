<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'pbraz0460@gmail.com';

  $from_name = $_POST['Nome'];
  $from_email = $_POST['Email'];
  $subject = $_POST['subject'];
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
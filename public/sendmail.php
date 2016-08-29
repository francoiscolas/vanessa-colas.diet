<?php
$accepted = false;
$to       = 'moi@vanessa-colas.diet';
$person   = filter_input(INPUT_POST, 'person', FILTER_SANITIZE_STRING);
$subject  = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$phone    = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[0-9 +]+$/']]);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$address  = $_POST['address'];
$message  = $_POST['message'];

if (empty($subject)) {
  $subject = "(pas d'objet)";
}

$message .= "\r\n\r\n--\r\n$person\r\n";
if (!empty($phone)) {
  $message .= "\r\nTéléphone:\r\n$phone\r\n";
}
if (!empty($address)) {
  $message .= "\r\nAdresse:\r\n$address\r\n";
}
if (!empty($person) && !empty($email)) {
  $accepted = mail($to, $subject, utf8_decode($message), "From: $person <$email>\r\n");
}

header('Content-Type: application/json');
echo '{"sent":'.(($accepted) ? 'true' : 'false').'}';

<?php
$ip = $_SERVER['REMOTE_ADDR'];
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = stripslashes(strip_tags($_POST['message1']));
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
$subject = 'Message from ' . $name;
$headers = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
$headers .= 'From:' . $email. "\n";
$template = 'You have a message from <b>' . $name . '</b><br/><br/>'
. 'Sender\'s email : ' . $email . '<br/><br/>'
. 'Message :<br/>' . $message . '<br/><br/>'
. 'IP : ' . $ip;
$sendmessage = $template;
$sendmessage = wordwrap($sendmessage, 70);
mail('yourmail@website.com', $subject, utf8_decode($sendmessage), $headers);
echo "Your message has been sent !";
} else {
echo "<p id=\"invalid\">* Invalid email ! *</p>";
}
?>
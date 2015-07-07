<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "emdad@3dux.co.uk";
 
    $email_subject = "Someone has requested a login";
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['full-name']) ||
  
        !isset($_POST['email']) ||
 
        !isset($_POST['organisation'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }     
 
    $full_name = $_POST['full-name']; // required
 
    $organisation = $_POST['organisation']; // required
 
    $email_from = $_POST['email']; // required
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$full_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "The below contact has requested a login.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($full_name)."\n";
  
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Organisation: ".clean_string($organisation)."\n";
 
// create email headers
 
$headers = 'From: '.$full_name."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
header('Location: http://www.3dux.co.uk/') ;
 
}
 
?>
<?php

$email_to = 'propheticlive@exousiadoorministry.org';
$email_subject = "New Prophetic Live Candidate";

if(isset($_POST['email'])) {
	
	function died($error) {
		echo "Sorry, but there were error(s) found with the form you submitted. ";
		echo "These errors appear below.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	if(!isset($_POST['email']) ||
		!isset($_POST['tel']) ||
		!isset($_POST['title']) ||
		!isset($_POST['otherTitles']) ||
		!isset($_POST['gender'])||
		!isset($_POST['name'])||
		!isset($_POST['dob'])||
		!isset($_POST['age'])||
		!isset($_POST['address'])||
		!isset($_POST['nationality'])||
		!isset($_POST['state'])||
		!isset($_POST['lga'])||
		!isset($_POST['m-status'])		
		) {
		died('Sorry, there appears to be a problem with your form submission.');		
	}
	
	//$passport = $_FILES['passport']; // required
	$email_from = $_POST['email']; // required
	$tel = $_POST['tel']; //  required
	$title = $_POST['title']; // required
	$otherTitles = $_POST['otherTitles']; // required
	$gender = $_POST['gender']; // required
	$name = $_POST['name']; // required
	$dob = $_POST['dob']; // required
	$age = $_POST['age']; // required
	$address = $_POST['address']; // required
	$nationality = $_POST['nationality']; // required
	$state = $_POST['state']; // required
	$lga = $_POST['lga']; // required
	$mstatus = $_POST['m-status']; // required
	
	$error_message = "";
	
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(preg_match($email_exp,$email_from)==0) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($name) < 2) {
  	$error_message .= 'Your Name does not appear to be valid.<br />';
  }
  
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "New Prophetic Live Candidate.\r\n\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:");
	  return str_replace($bad,"",$string);
	}
	
	//$email_message .= $passport."\r\n\n";
	$email_message .= "E-Mail Address: ".clean_string($email_from)."\r\n\n";
	$email_message .= "Phone Number: ".clean_string($tel)."\r\n\n";
	$email_message .= "Full Name: ".clean_string($otherTitles) . " " .clean_string($title) . " " .clean_string($name)."\r\n\n";
	$email_message .= "Gender: ".clean_string($gender)."\r\n\n";
	$email_message .= "Date of Birth: ".clean_string($dob)."\r\n\n";
	$email_message .= "Age: ".clean_string($age)."\r\n\n";
	$email_message .= "Home Address: ".clean_string($address)."\r\n\n";
	$email_message .= "Nationality: ".clean_string($nationality)."\r\n\n";
	$email_message .= "State of Origin: ".clean_string($state)."\r\n\n";
	$email_message .= "L.G.A: ".clean_string($lga)."\r\n\n";
	$email_message .= "Marital Status: ".clean_string($mstatus)."\r\n\n";
	
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
//header("Location: $thankyou");
?>
<?php echo 'Thank You'; ?>
<?php
}
die();
?>
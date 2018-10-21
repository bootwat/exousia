<?php

$email_to = 'exousiatv@exousiadoorministry.org';
$email_subject = "New Exousia TV Partner";

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
		!isset($_POST['officeaddress'])||
		!isset($_POST['nationality'])||
		!isset($_POST['state'])||
		!isset($_POST['lga'])||
		!isset($_POST['languages'])||
		!isset($_POST['m-status'])||
		!isset($_POST['nextofKin'])||
		!isset($_POST['nextofKinTel'])||
		!isset($_POST['hobbies'])||
		!isset($_POST['budget'])||
		!isset($_POST['above5K'])||
		!isset($_POST['wouldIncrease'])||
		!isset($_POST['comment'])		
		) {
		died('Sorry, there appears to be a problem with your form submission.');		
	}
	
	//$passport = $_FILES['passport']; // required
	$email_from = $_POST['email']; // required
	$tel = $_POST['tel']; //  required
	$title = $_POST['title']; // required
	$otherTitles = $_POST['otherTitles']; // required
    $gender = $_POST['gender']; // required
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $officeaddress = $_POST['officeaddress'];
    $nationality = $_POST['nationality'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $languages = $_POST['languages'];
    $mstatus = $_POST['m-status'];
    $nextofKin = $_POST['nextofKin'];
    $nextofKinTel = $_POST['nextofKinTel'];
    $hobbies = $_POST['hobbies'];
    $budget = $_POST['budget'];
    $above5K = $_POST['above5K'];
    $wouldIncrease = $_POST['wouldIncrease'];
	$comment = $_POST['comment'];
	
	
	
	$error_message = "";
	
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(preg_match($email_exp,$email_from)==0) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  if(strlen($name) < 2) {
  	$error_message .= 'Your Name does not appear to be valid.<br />';
  }
  if(strlen($comment) < 2) {
  	$error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "New Partner.\r\n\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:");
	  return str_replace($bad,"",$string);
	}
	
	//$email_message .= $passport ."\r\n\n";
	$email_message .= "E-Mail: ".clean_string($email_from)."\r\n\n";
	$email_message .= "Phone Number: ".clean_string($tel)."\r\n\n";
	$email_message .= "Full Name: ".clean_string($otherTitles) . " " .clean_string($title) . " " .clean_string($name)."\r\n\n";
	$email_message .= "Gender: ".clean_string($gender)."\r\n\n";
	$email_message .= "Date of Birth: ".clean_string($dob)."\r\n\n";
	$email_message .= "Age: ".clean_string($age)."\r\n\n";
	$email_message .= "Home Address: ".clean_string($address)."\r\n\n";
	$email_message .= "Office Address: ".clean_string($officeaddress)."\r\n\n";
	$email_message .= "Nationality: ".clean_string($nationality)."\r\n\n";
	$email_message .= "State of Origin: ".clean_string($state)."\r\n\n";
	$email_message .= "L.G.A: ".clean_string($lga)."\r\n\n";
	$email_message .= "Languages Spoken: ".clean_string($languages)."\r\n\n";
	$email_message .= "Marital Status: ".clean_string($mstatus)."\r\n\n";
	$email_message .= "Next of Kin: ".clean_string($nextofKin)."\r\n\n";
	$email_message .= "Next of Kin Phone Number: ".clean_string($nextofKinTel)."\r\n\n";
	$email_message .= "Hobbies: ".clean_string($hobbies)."\r\n\n";
	$email_message .= "Amount to partner with Exousia TV: ".clean_string($budget)."\r\n\n";
	$email_message .= "Above N5,000 (specify): ".clean_string($above5K)."\r\n\n";
	$email_message .= "Would you like to increase your partnership with Exousia TV: ".clean_string($wouldIncrease)."\r\n\n";
	$email_message .= "Brief comment on how you came across Exousia TV: ".clean_string($comment)."\r\n\n";
    
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
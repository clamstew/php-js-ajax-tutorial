<?php

	sleep(3); // this is more for example purposes so you cna see the loader gif
	
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$message = trim($_POST['message']);
	$honeypot = $_POST['honeypot'];
	$humancheck = $_POST['humancheck'];
	
	if ($honeypot == 'http://' && empty($humancheck)) {
	
		$error_message = ''; 
		$reg_exp = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,4}$/";
		
		if(!preg_match($reg_exp, $email)) {
		
			$error_message .= "<p>A valid email is required.</p>";
		
		}
		
		if (empty($name)) {
		
			$error_message .= "<p>Please provide your name.</p>";
			
		}
		
		if (empty($message)) {
		
			$error_message .= "<p>A message is required.</p>";
		
		}
		
		if (!empty($error_message)) {
		
			$return['error'] = true; 
			$return['msg'] = "<h3>Ooops! The request was sucessful but your form is not filled out correctly.</h3>" . $error_message;
			echo json_encode($return); 
			exit();
		
		} else {
		
			$return['error'] = false; 
			$return['msg'] = "<p>Thanks for your feedback " . $name . ".</p>"; 
			echo json_encode($return); 
			exit();
		
		}
	
	} else {
	
		$return['error'] = true; 
		$return['msg'] = "<h3>Ooops! There was a problem with your submission.  Please try again.</h3>"; 
		echo json_encode($return); 
	
	}
	
	 

?>

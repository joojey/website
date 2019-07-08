<?php

// if the url field is empty, but the message field isn't
if(isset($_POST['url']) && $_POST['url'] == '' && $_POST['message'] != '' && $_POST['email'] != '' && $_POST['dpp']){

	$youremail = 'joannes.wolters@posteo.de';

	// prepare a "pretty" version of the message
	// Important: if you added any form fields to the HTML, you will need to add them here also
	$body = "This is the form that was just submitted:

	Betreff: $_POST[reference]
	Name:  $_POST[name]
	E-Mail: $_POST[email]
	Telefon: $_POST[phone]
	Nachricht: $_POST[message]";

	// Use the submitters email if they supplied one
	// (and it isn't trying to hack your form).
	// Otherwise send from your email address.
	if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}



	// finally, send the message
	mail($youremail, 'Contact Form', $body, $headers );
}

header('Location: -----------------------------');
exit('Redirecting you to -----------------------------');');

<?php

class ContactFormHandler {

function handleContactForm() {
    
		if($this->isFormSubmitted() && $this->isNonceSet()) {
			if($this->isFormValid()) {
				$this->sendContactForm();
			} else {
				$this->displayContactForm();
			}
		} else {
			$this->displayContactForm();
		}

    }

    public function sendContactForm() {
    	$contactName = strip_tags($_POST['contactname']);
    	$contactEmail = strip_tags($_POST['contactemail']);
    	$contactContent = strip_tags($_POST['contactcontent']);

    	$emailAccepted = 0;
    	$bannedArray = array("Diflucan", "Diabetes", "Pharma", "Pharmacy", "Fluconazole", "Cialis", "diflucan", "diabetes", "pharma", "pharmacy", "fluconazole", "cialis", "http://");
    	foreach ($bannedArray as $bannedWord){
			$emailCheck = strpos($contactContent, $bannedWord);
    		if ($emailCheck !== false) :
    			$emailAccepted = 1;
    		endif;
    	}


    	$emailTo = "palaute@reimari.fi";


    	$subject = 'Reimari Palaute - '.$contactName;
		$body = "Nimi: $contactName \n\nSähköposti: $contactEmail \n\nPalaute: $contactContent";
		$headers = 'From: '.$contactName.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $contactEmail;

		if ($emailAccepted == 0) :
			wp_mail($emailTo, $subject, $body, $headers);
		endif;

		echo "Palaute lähetetty onnistuneesti. Kiitos yhteydenotostasi!";
		
    }	
   

    function isNonceSet() {
    	if( isset( $_POST['nonce_field_for_submit_contact_form'] )  &&
    	  wp_verify_nonce( $_POST['nonce_field_for_submit_contact_form'], 'submit_contact_form' ) ) return true;
    	else return false;
    }

    function isFormValid() {
    	//Check all mandatory fields are present.
		if ( trim( $_POST['contactname'] ) === '' ) {
			$error = 'Laita nimesi tähän.';
			$hasError = true;
		} else if (!filter_var($_POST['contactemail'], FILTER_VALIDATE_EMAIL)  ) {
			$error = 'Laita sähköpostisi tähän.';
			$hasError = true;
		} else if ( trim( $_POST['contactcontent'] ) === '' ) {
			$error = 'Laita viestisi tähän.';
			$hasError = true;
		} 

		//Check if any error was detected in validation.
		if($hasError == true) {
			echo $error;
			return false;
		}
		return true;
    }

 	function isFormSubmitted() {
    	if( isset( $_POST['submitContactForm'] ) ) return true;
    	else return false;
    }
   	
   	
	//This function displays the Contact form.
    public function displayContactForm() {
    	?>
    	<div id ="contactFormSection">
	    	<form action="" id="contactForm" method="POST" enctype="multipart/form-data">
	 
			    <fieldset class="form-group">
			        <label for="name">Nimi:</label>
			 
			        <input type="text" name="contactname" class="form-control" id="contactname" />
			    </fieldset>

			    <fieldset class="form-group">
			        <label for="email">Sähköposti:</label>
			 
			        <input type="text" name="contactemail" class="form-control" id="contactemail" />
			    </fieldset>
			 
			    <fieldset class="form-group">
			        <label for="content">Palaute:</label>
			 
			        <textarea name="contactcontent" class="form-control" id="contactcontent" rows="10" cols="35" ></textarea>
			    </fieldset>
			 
			    <fieldset class="form-group">
			        <button type="submit" class="btn btn-primary" name="submitContactForm">Lähetä</button>
			    </fieldset>

			    <?php wp_nonce_field( 'submit_contact_form' , 'nonce_field_for_submit_contact_form'); ?>
	 
			</form>
		</div>
		<?php
    }
}
?>
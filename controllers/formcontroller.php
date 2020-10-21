<?php

class FormController {
	var $titlelink;
	var $formresponder;
	var $message="";
	var $loginsuccess = 0;
	
	function __construct($titlelink, $formresponder) {
		$this->titlelink= $titlelink;
		$this->formresponder = $formresponder;
	}

	function displayTitleLink() {
		echo '<h4><a href="//tjgwebservices.com/">'.$this->titlelink.'</a></h4>';
	}

	function displayWelcome() {
		echo '<p>Welcome, '.$_SESSION["name"].'</p>';
	}

	

}

?>

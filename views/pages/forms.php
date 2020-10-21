<?php


require_once('../../controllers/formcontroller.php');

$fc = new FormController("TJG Web Services Store",
			htmlspecialchars($_SERVER["PHP_SELF"]));

if ($_GET["formtype"] == "title"){
	$fc->displayTitleLink();
}
if ($_GET["formtype"] == "welcome"){
	$fc->displayWelcome();
}
if ($_GET["formtype"] == "login"){
	$fc->logInForm();
}
if ($_GET["formtype"] == "logout"){
	$fc->logOutForm();
}
if ($_GET["formtype"] == "register"){
	$fc->registerForm();
}

if ($_GET["formtype"] == "buynowitem"){
	echo '<div>';
	echo '<p>Buy Now Item</p>';
	echo '</div>';
}
?>
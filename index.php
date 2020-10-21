<?php
require_once('controllers/storecontroller.php');
require_once('controllers/formcontroller.php');
require_once('controllers/productscontroller.php');

$message = "";
$mainstring = "";

$fc = new FormController("TJG Web Services Store",
			htmlspecialchars($_SERVER["PHP_SELF"]));

$xmlc = new XMLController('xml/catalog.xml');
$xmlc->parseDocument();

$pagec = new PageController();
$pagec->printHeader($xmlc->headingtitle, $xmlc->version, $xmlc->theme);
$pagec->printLinks($xmlc->componenttitle,$xmlc->links);
$pagec->printTabs($xmlc->tabs);
$pagec->printMainSection();
$pagec->printFooter($xmlc->headingtitle);

function createJArray($arrayname, $sarray){
	echo "var ".$arrayname." =";
	$counter = 0; 
	foreach($sarray as $arrayitem){
		if( $counter == 0 ) { 
			echo '["'.$arrayitem.'"';
		} else if ( $counter == count( $sarray ) - 1) {
			echo ',"'.$arrayitem.'"];';
			echo "\n";
		
		} else {
			echo ',"'.$arrayitem.'"';
		}
		$counter = $counter + 1; 
	}
};

function create2JArray($arrayname, $sarray){
	echo "var ".$arrayname." =";
	$counter = 0; 
	foreach($sarray as $arrayitem){
		if( $counter == 0 ) { 
			echo '[["'.$arrayitem[0].'","'.$arrayitem[1].'"]';
		} else if ( $counter == count( $sarray ) - 1) {
			echo ',["'.$arrayitem[0].'","'.$arrayitem[1].'"]];';
			echo "\n";
		
		} else {
			echo ',["'.$arrayitem[0].'","'.$arrayitem[1].'"]';
			echo "\n";
		}
		$counter = $counter + 1; 
	}
};

function create4JArray($arrayname, $sarray){
	echo "var ".$arrayname." =";
	$counter = 0; 
	foreach($sarray as $arrayitem){
		if( $counter == 0 ) { 
			echo '[["'.$arrayitem[0].'","'.$arrayitem[1].'","'.$arrayitem[2].'","'.$arrayitem[3].'"]';
		} else if ( $counter == count( $sarray ) - 1) {
			echo ',["'.$arrayitem[0].'","'.$arrayitem[1].'","'.$arrayitem[2].'","'.$arrayitem[3].'"]];';
			echo "\n";
		
		} else {
			echo ',["'.$arrayitem[0].'","'.$arrayitem[1].'","'.$arrayitem[2].'","'.$arrayitem[3].'"]';
			echo "\n";
		}
		$counter = $counter + 1; 
	}
};

$productsobj = new ProductsController('xml/products.xml');
$productsobj->parseDocument();

create2JArray("sessions", $productsobj->analyses);
create2JArray("analyses", $productsobj->analyses);
create4JArray("products", $productsobj->products);
create2JArray("discussiontopics", $productsobj->topics);
create2JArray("services", $productsobj->services);
createJArray("topics", $xmlc->topics);
createJArray("helptext", $xmlc->helps);
createJArray("models1", $xmlc->models1);
createJArray("models2", $xmlc->models2);
createJArray("leftcomponents", $xmlc->components1);
createJArray("rightcomponents", $xmlc->components2);
?>
</script>
<script src="js/content.js?v=<?php echo $xmlc->version; ?>"></script>
<script src="js/script.js?v=<?php echo $xmlc->version; ?>"></script>
<script src="js/examples.js?v=<?php echo $xmlc->version; ?>"></script>
<script>

var appendFormType = function(type,element){
	var xhr0 = new XMLHttpRequest();
	xhr0.open('GET', 'views/pages/forms.php?formtype='+type, true);
	xhr0.onreadystatechange= function() {
			if (this.readyState!==4) return;
			if (this.status!==200) return;
			var newSpan = document.createElement("article");
			newSpan.innerHTML = this.responseText; 
			element.appendChild(newSpan);
	};
	xhr0.send();
}

appendFormType('title',document.getElementById('formEl'));
appendFormType('buynowitem',document.getElementById('buynowitem'));

</script>
<script>
var showModal = function (text) {
	var exampleModal = document.getElementById("viewExample");
	exampleModal.style.display='block';
	exampleModal.getElementsByTagName('p')[0].innerHTML = text;	
}
</script>
</html>
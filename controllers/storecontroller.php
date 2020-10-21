<?php

class XMLController {
	var $document;

	function __construct($document) {
		$this->document = $document;
	}

	function parseDocument() {
		$doc = new DOMDocument();
		$doc->load( $this->document );
		$this->heading = $doc->getElementsByTagName( "heading" )->item(0)->nodeValue;
		$this->headingtitle = $doc->getElementsByTagName( "headingtitle" )->item(0)->nodeValue;
		$this->headingdescription = $doc->getElementsByTagName( "headingdescription" )->item(0)->nodeValue;
		$this->version = $doc->getElementsByTagName( "version" )->item(0)->nodeValue;
		$this->theme = $doc->getElementsByTagName( "theme" )->item(0)->nodeValue;
		$this->componenttitle = $doc->getElementsByTagName( "componenttitle" )->item(0)->nodeValue;

		$l = array();
		$t = array();
		$to = array();
		$h = array();
		$m1 = array();
		$m2 = array();
		$c1 = array();
		$c2 = array();

		$links = $doc->getElementsByTagName( "links" )->item(0)->getElementsByTagName( "link" );
		foreach( $links as $link )
		{
			$ahref = $link->nodeValue;
			array_push($l, $ahref);
		}
		$this->links = $l;

		$tabs = $doc->getElementsByTagName( "tabs" )->item(0)->getElementsByTagName( "tab" );
		foreach( $tabs as $tab )
		{
			$label = $tab->nodeValue;
			array_push($t, $label);
		}
		$this->tabs = $t;

		$topics = $doc->getElementsByTagName( "topics" )->item(0)->getElementsByTagName( "topic" );
		foreach( $topics as $topic )
		{
			$label = $topic->nodeValue;
			array_push($to, $label);
		}
		$this->topics = $to;

		$helps = $doc->getElementsByTagName( "helps" )->item(0)->getElementsByTagName( "help" );
		foreach( $helps as $help )
		{
			$label = $help->nodeValue;
			array_push($h, $label);
		}
		$this->helps = $h;

		$models1 = $doc->getElementsByTagName( "models1" )->item(0)->getElementsByTagName( "model" );
		foreach( $models1 as $model )
		{
			$label = $model->nodeValue;
			array_push($m1, $label);
		}
		$this->models1 = $m1;

		$models2 = $doc->getElementsByTagName( "models2" )->item(0)->getElementsByTagName( "model" );
		foreach( $models2 as $model )
		{
			$label = $model->nodeValue;
			array_push($m2, $label);
		}
		$this->models2 =$m2;


		$components1 = $doc->getElementsByTagName( "leftcomponents" )->item(0)->getElementsByTagName( "component" );
		foreach( $components1 as $component )
		{
			$label = $component->nodeValue;
			array_push($c1, $label);
		}
		$this->components1 = $c1;

		
		$components2 = $doc->getElementsByTagName( "rightcomponents" )->item(0)->getElementsByTagName( "component" );
		foreach( $components2 as $component )
		{
			$label = $component->nodeValue;
			array_push($c2, $label);
		}
		$this->components2 = $c2;
	}
}


class PageController {

	function __construct() {
	}


	
	function printHeader($title,$version,$theme){
		echo '<!DOCTYPE html>';
		echo '<html>';
		echo '<head>';
		echo '<title>'.$title.'</title>';
		echo '<link rel="stylesheet" href="//tjgwebservices.com/shop/css/main.css?v='.$version.'" />';
		echo '<link rel="stylesheet" href="//tjgwebservices.com/shop/css/modal.css?v='.$version.'" />';
		echo '<link rel="stylesheet" href="//tjgwebservices.com/shop/css/form.css?v='.$version.'" />';
		echo '</head>';
		echo '<body>';
		echo '<nav>';
		echo '<span class="theme">'.$theme.'</span>';
		echo '</nav>';
		echo '<summary></summary>';
	}
		
	function printLinks($componenttitle,$links){
		echo '<footer>';
		echo '<p>'.$componenttitle.'</p>';
		echo '</footer>';
		echo '<div id="page-loading">';
		echo '</div>';
		echo '<div id="download" class="modal">';
		echo '<div class="modal-content">';
		echo '<div class="backpadding">';
		echo '<i onclick="document.getElementById(\'download\').style.display=\'none\'" ></i>';
		echo '<h2>'.$componenttitle.'</h2>';
		echo '<p>Qualitative Design Methods</p>';
		echo '<p>Qualitative Design available for managing artifacts and the resource process.</p>';
		echo '<button type="button" onclick="document.getElementById(\'download\').style.display=\'none\'">Design Tools</button>';
		echo '<a href="'.$links[0].'">Learn More</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<div id="viewExample" class="modal">';
		echo '<div class="modal-content">';
		echo '<div class="backpadding">';
		echo '<i onclick="document.getElementById(\'viewExample\').style.display=\'none\'" ></i>';
		echo '<h2>'.$componenttitle.'</h2>';
		echo '<p>Qualitative Design Methods</p>';
		echo '<button type="button" onclick="document.getElementById(\'viewExample\').style.display=\'none\'">Design Tools</button>';
		echo '<a href="'.$links[0].'">Learn More</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	
	function printTabs($links){
		echo '<main>';
		echo '<ul class="tabbuttons">';
		echo '<li class="selected active"><a href="#tab">'.$links[0].'</a></li>';
		echo '<li><a href="#tab">'.$links[1].'</a></li>';
		echo '<li><a href="#tab">'.$links[2].'</a></li>';
		echo '</ul>';
		echo '<main>';
	}
	
	function printMainSection(){
		echo '<section>';
		echo '<aside>';
		echo 'East';
		echo '</aside>';
		echo '<figure>';
		echo '<div>';
		echo '<div>';
		echo '<a href="#left">Left</a>';
		echo '</div>';
		echo '</div>';
		echo '</figure>';
		echo '<main>';
		echo '</main>';
		echo '<figure>';
		echo '<div>';
		echo '<div>';
		echo '<a href="#right">Right</a>';
		echo '</div>';
		echo '</div>';
		echo '</figure>';
		echo '<aside>';
		echo 'West';
		echo '</aside>';
		echo '</section>';
		echo '</main>';
		echo '</main>';
	}
		
	function printFooter($headingtitle){
		echo '<footer>';
		echo '<p id="updatemessage"></p>';
		echo '<h2>'.$headingtitle.'</h2>';
		echo '</footer>';
		echo '</body>';
		echo '<script>';
	}


}	
	
?>

<?php

class ProductsController {
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

		$a = array();
		$l = array();
		$f = array();
		$t = array();
		$s = array();
		$p = array();
		$ses = array();
		$trains = array();
		$addl = array();
		$sitel = array();
		$links = $doc->getElementsByTagName( "links" )->item(0)->getElementsByTagName( "link" );
		$additionallinks = $doc->getElementsByTagName( "additionallinks" )->item(0)->getElementsByTagName( "link" );
		$sitelinks = $doc->getElementsByTagName( "sitelinks" )->item(0)->getElementsByTagName( "link" );
		foreach( $links as $link )
		{
			$ahref = $link->nodeValue;
			array_push($l, $ahref);
		}
		$this->links=$l;

		foreach( $additionallinks as $addlink )
		{
			$addhref = $addlink->nodeValue;
			array_push($addl, $addhref);
		}

		$this->additionallinks=$addl;
		foreach( $sitelinks as $slink )
		{
			$shref = $slink->nodeValue;
			array_push($sitel, $shref);
		}
		$this->sitelinks=$sitel;

		$topics = $doc->getElementsByTagName( "topics" )->item(0)->getElementsByTagName( "topic" );
		foreach( $topics as $topic )
		{
			$et = array();
			$subject = $topic->getElementsByTagName( "subject" )->item(0)->nodeValue;
			$description = $topic->getElementsByTagName( "description" )->item(0)->nodeValue;
			array_push($et, $subject, $description);
			array_push($t, $et);
		}
		$this->topics = $t;

		$services = $doc->getElementsByTagName( "services" )->item(0)->getElementsByTagName( "service" );
		foreach( $services as $service )
		{
			$es = array();
			$title = $service->getElementsByTagName( "title" )->item(0)->nodeValue;
			$description = $service->getElementsByTagName( "description" )->item(0)->nodeValue;
			array_push($es, $title, $description);
			array_push($s, $es);
		}
		$this->services=$s;

		$analyses = $doc->getElementsByTagName( "analyses" )->item(0)->getElementsByTagName( "analysis" );
		foreach( $analyses as $analysis )
		{
			$ea = array();
			$title = $analysis->getElementsByTagName( "title" )->item(0)->nodeValue;
			$description = $analysis->getElementsByTagName( "description" )->item(0)->nodeValue;
			array_push($ea, $title, $description);
			array_push($ses, $ea);
		}
		$this->analyses=$ses;

		$sessions = $doc->getElementsByTagName( "sessions" )->item(0)->getElementsByTagName( "session" );
		foreach( $sessions as $session )
		{
			$es = array();
			$course = $session->getElementsByTagName( "course" )->item(0)->nodeValue;
			$description = $session->getElementsByTagName( "description" )->item(0)->nodeValue;
			array_push($es, $course, $description);
			array_push($trains, $es);
		}
		$this->training = $trains;

		$figures = $doc->getElementsByTagName( "figures" )->item(0)->getElementsByTagName( "figure" );
		foreach( $figures as $figure )
		{
			$ef = array();
			$title = $figure->getElementsByTagName( "title" )->item(0)->nodeValue;
			$description = $figure->getElementsByTagName( "title" )->item(0)->nodeValue;
			$list = $figure->getElementsByTagName( "list" )->item(0)->getElementsByTagName( "element" );
			$listarray = array();
			foreach ($list as $element) {
				array_push($listarray, $element->nodeValue);
			}
			array_push($ef, $title, $description, $listarray);
			array_push($f, $ef);
		}

		$this->figures=$f;
		$articles = $doc->getElementsByTagName( "articles" )->item(0)->getElementsByTagName( "article" );;
		foreach( $articles as $article )
		{
			$ep = array();
			$titles = $article->getElementsByTagName( "title" );
			$title = $titles->item(0)->nodeValue;

			$sections = $article->getElementsByTagName( "section" );
			$section = $sections->item(0)->nodeValue;
			
			if ($article->getElementsByTagName("image")->length == 0) {
				$image = "";
			} else {
				$images = $article->getElementsByTagName("image");
				$image = $images->item(0)->nodeValue;
			}
			array_push($ea, $title, $section, $image);
			array_push($a, $ea);
		}
		$this->articles=$a;
		$products = $doc->getElementsByTagName( "products" )->item(0)->getElementsByTagName( "product" );;
		foreach( $products as $product )
		{
			$ep = array();
			$title = $product->getElementsByTagName( "title" )->item(0)->nodeValue;
			$description = $product->getElementsByTagName( "description" )->item(0)->nodeValue;
			if ($product->getElementsByTagName("imagepath")->length == 0) {
				$imagepath = "";
			} else {
				$imagepath = $product->getElementsByTagName("imagepath")->item(0)->nodeValue;
			}
			$price = $product->getElementsByTagName( "price" )->item(0)->nodeValue;
			array_push($ep, $title, $description, $imagepath, $price);
			array_push($p, $ep);
		}
		$this->products=$p;

	}

}

?>
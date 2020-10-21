<?php
class StoreItemController {
	var $link;
	var $formresponder;
	var $message="";
	
	function __construct($link,$formresponder) {
		$this->link = $link;
		$this->formresponder = $formresponder;
	}
	
	
	function startArticle() {
		echo '<article>';
	}
	
	function endArticle() {
		echo '</article>';
	}
	
	function startSection() {
		echo '<section>';
	}
	
	function endSection() {
		echo '</section>';
	}
	
	function displayFeaturedItem() {
		$this->startSection();
		echo '<div>';
		echo '<img src="/img/featureditem001.png" alt="Featured Item" title="Featured Item" '; 
		echo ' style="border: 5px inset #2196F3;margin: 5px 10px 5px 10px;" />';
		echo '</div>';
		$this->endSection();		
	}
	
	function displayBuyNowItem(){
		$this->startSection();
		echo '<p>Purchase the latest Product</p>';
		echo '<p>Buy now page.</p>';
		$this->endSection();
	}
	
}	
?>

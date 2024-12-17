<?php
class Model
{
	private $carPrice;

	public function setPrice($price){
		$this -> carPrice = $price;
	}

	public function getPrice(){
		return $this -> carPrice;
	}
}

?>
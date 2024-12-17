<?php
require "Controller.php";
class View {
	private $controller;
	public function __construct(Controller $controller){
		$this->controller = $controller;
	}

	public function output(){
		return "<strong>". $this->controller->expensiveOrNot() . "</strong>";
	}
}
$priceToCheck = 20000;
$model1 = new Model();
$model1 -> setPrice($priceToCheck);

$controller1 = new Controller($model1);
$view1 = new View($controller1);
echo $output = $view1 -> output();
?>
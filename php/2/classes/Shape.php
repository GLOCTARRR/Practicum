<?php
	abstract class Shape{
		private $x, $y, $size;
		
		public function __construct(){
			$this->show();
		}
		
		public function __destruct(){			
		}
		
		abstract public function move($x, $y);
		
		abstract public function editSize($size);
		
		abstract public function calculateArea();
		
		abstract public function show();		
	}
?>
<?php
require_once( "Shape.php" );
	class Circle extends Shape{
		private $x1, $y1, $radius, $size; 
		
		public function __construct($x, $y, $radius){
			$this->calculateCoor($x, $y);
			$this->size = 1.0;
			$this->radius = $radius;
			
			
		}
		
		public function __destruct(){
		}
		
		public function move($x, $y){
			$this->x1 = $x;
			$this->y1 = $y;
			$this->calculateCoor($this->x1, $this->y1);
		}
		
		public function editSize($size){
			$this->size = $size;
			$this->calculateCoor($this->x1, $this->y1);
		}
		
		public function editRadius($radius){
			$this->radius = $radius;
			$this->calculateCoor($this->x1, $this->y1);
		}
		
		public function calculateArea(){
			$area = pi() * pow($this->radius, 2);
			echo $area;
		}
		
		private function calculateCoor($x, $y){
			$this->x1 = $x;
			$this->y1 = $y;
			$this->radius = $this->radius * $this->size;			
		}
				
		public function show(){	
 			$img = imagecreatetruecolor(1000, 600);
			$rgb = 0xFFFFFF; 
			imagefill($img, 0, 0, $rgb); 
			$black = imagecolorallocate($img, 0, 0, 0);
			imageellipse($img, $this->x1, $this->y1, $this->radius, $this->radius, $black);
			imagepng($img, 'Shape.png'); 
			imagedestroy($img);
		}
		
	}
	
?>

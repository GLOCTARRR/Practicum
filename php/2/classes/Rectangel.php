<?php
require_once( "Shape.php" );
	class Rectangel extends Shape{
		private $x1, $y1, $x2, $y2, $size = 1.0, $dx = 300, $dy = 200, $area; 
		
		public function __construct($x, $y){
			$this->calculateCoor($x, $y);
			$this->size = 1.0;
		}		
		
		public function move($x, $y){
			$this->calculateCoor($x, $y);
		}
		
		public function editSize($size){
			$this->size = $size;
			$this->calculateCoor($this->x1, $this->y1);	
		}
		
		public function calculateArea(){			
			$width = $this->dy * $this->size;
			$height = $this->dx * $this->size;
			$this->area	=	$width * $height;
			echo $this->area;
		}
		
		private function calculateCoor($x, $y){
			$this->x1 = $x;
			$this->y1 = $y;
			$this->x2 = $x + $this->dx * $this->size;
			$this->y2 = $y + $this->dy * $this->size;			
		}
		
		
			
			
		public function show(){
			$img = imagecreatetruecolor(1000, 600);
			$rgb = 0xFFFFFF; 
			imagefill($img, 0, 0, $rgb); 
			$black = imagecolorallocate($img, 0, 0, 0);
			imagerectangle($img, $this->x1, $this->y1, $this->x2, $this->y2, $black); 
			imagepng($img, 'Shape.png'); 
			imagedestroy($img);
			
		}
		
	}
	
	
	
?>

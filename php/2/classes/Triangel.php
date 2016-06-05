<?php 

require_once( "Shape.php" );
	class Triangel extends Shape{
		private $x1 ,$y1, $x2, $y2, $x3, $y3, $size = 1.0; 
		
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
		
		private function calculateCoor($x, $y){
			$this->x1 = $x;
			$this->y1 = $y;
			$this->x2 = $x + 250 * $this->size;
			$this->y2 = $y - 200 * $this->size;
			$this->x3 = $x + 500 * $this->size;
			$this->y3 = $y;			
		}
		
		public function calculateArea(){			
			$AB = sqrt(pow(($this->x1 - $this->x2), 2) + pow(($this->y1 - $this->y2), 2));
			$BC = sqrt(pow(($this->x2 - $this->x3), 2) + pow(($this->y2 - $this->y3), 2));
			$CA = sqrt(pow(($this->x3 - $this->x1), 2) + pow(($this->y3 - $this->y1), 2));
    
			$P = ($AB + $BC + $CA) / 2;
			$area = sqrt(($P - $AB) * ($P - $BC) * ($P - CA) * $P);
			return $area;
		}
		
	
		public function show(){			
			$img = imagecreatetruecolor(1000, 600);
			$rgb = 0xFFFFFF; 
			imagefill($img, 0, 0, $rgb); 
			$black = imagecolorallocate($img, 0, 0, 0);
			imageline($img, $this->x1, $this->y1, $this->x2, $this->y2, $black); 
			imageline($img, $this->x2, $this->y2, $this->x3, $this->y3, $black); 
			imageline($img, $this->x3, $this->y3, $this->x1, $this->y1, $black); 
			imagepng($img, 'Shape.png'); 
			imagedestroy($img);
		}
	}
	
?>
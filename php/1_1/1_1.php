<html>
	<head>
		<link rel= 'StyleSheet' type = 'text/css' href='style.css'/>
	</head>
	<body>
	<?php
	
	function sum() {
		$number = $_POST['number'];
		$n = 1;
		$sum = 0;
		while($n <= $number){
			$sum += pow($n, $n);		
			$n++;		
		}
		return $sum;
	}
	
	function square() {
		$number = $_POST['number'];
		return pow($number, 2);
	}
	
	function sumSquare(){
		$number = $_POST['number'];
		$n = 1;
		$sum =0;
		while($n <= $number){
			$sum += pow($n,2);
			$n++;
		}
		return $sum;
	}
	
	
	
	
	

?>
		<div id="form">
			<form action = '1_1.php' method = 'POST'>
				<input id="number" name="number" placeholder="Enter number..." type="text" autocomplete="off"/>
				<input id='calculate' type='submit' value='Calculate' class='button' name='calculate' /> 
				<div><span class='text'>n^2:</span><div id ="res"><?=square()?></div></div>
				<div><span class='text'>1^1 + 2^2 + .. + n^n:</span><div id="res"><?=sum()?></div></div>
				<div><span class='text'>1^2 + 2^2 + .. + n^2:</span><div id ="res"><?=sumSquare()?></div></div>
				
			</form>
		</div>
	</body>
</html>

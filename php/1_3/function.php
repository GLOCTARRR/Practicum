<?php
	$elements = Array();
	$elements_number = 0;
	
	
		
	function createArray(){
		global $elements_number, $elements;
		$elements_number = $_POST['number'];
		if($elements_number > 0){
			for($i = 0; $i < $elements_number; $i++){	
				$elements[$i] = mt_rand(1, 100);
			}
		}			
	}
	
	function displayElements(){
		global  $elements;
		foreach($elements as $value)
			echo $value." ";		
	}
	
	function evenElements(){
		global $elements_number, $elements;
		$result = 1;
		for($i = 0; $i < $elements_number; $i++){
			if($i%2==0 && $elements[$i]>0){
				$result *= $elements[$i];				
			}
		}
		echo $elements_number!=0 ? $result : "";
	}
		
	function oddElements(){
		global $elements_number, $elements;
		$result = 1;
		for($i = 0; $i < $elements_number; $i++){
			if($i%2!=0 && $elements[$i]>0){
				$result *= $elements[$i];
			}			
		}	
			echo $elements_number!=0 ? $result : "";
	}
?>
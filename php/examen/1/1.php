<?php
	function concatPaths(){
		$path='';
		$firstTemplate = "/\/$/";
		$secondTemplate = "/^\//";
		$thirdTemplate = "/\w$/";
		$fourthTemplate = "/^\w/";
		foreach(func_get_args() as $element){
			if(preg_match($firstTemplate, $path) && preg_match($secondTemplate, $element))
				$path = rtrim($path, '/');
			
			if(preg_match($thirdTemplate, $path) && preg_match($fourthTemplate, $element))
				$path .= '/';			

			$path .= $element;			
		}
		$path = rtrim($path, '/');
		return $path;		
	}
?>
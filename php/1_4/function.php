<?php
	$maps["1"]="Единица";
	$maps["2"]="Двойка";
	$maps["3"]="Тройка";
	$maps["4"]="Четверка";
	$maps["5"]="Пятерка";
	$maps["6"]="Шестерка";
	$maps["7"]="Семерка";
	$maps["8"]="Восмьерка";
	$maps["9"]="Девятка";
	$maps["10"]="Десятка";
	$maps["11"]="Валет";
	$maps["12"]="Дама";
	$maps["13"]="Король";
	$maps["14"]="Туз";
	
	function getTitle($number){
		global $maps;
		echo $maps[$number];
	}
?>
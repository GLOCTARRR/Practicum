<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel= 'StyleSheet' type = 'text/css' href='style.css'/>
	</head>
	<body>
	<?php
	
	include "function.php";
	if(!empty($_POST['number'])){
		createArray();
	}
	?>
		<div id="form">
			<form action = '1_3.php' method = 'POST'>
				<input id="number" name="number" type="text" autocomplete="off"/>
				<input type="submit" name="calculate" />
				<div><span class='text'>Элементы массива:</span><div class ="res"><?=displayElements()?></div></div>
				<div><span class='text'>Произведение парных индексов:</span><div class ="res"><?=evenElements()?></div></div>
				<div><span class='text'>Произведение не парных индексов:</span><div class ="res"><?=oddElements()?></div></div>	
			</form>
		</div>
	</body>
</html>

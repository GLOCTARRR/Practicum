<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel= 'StyleSheet' type = 'text/css' href='style.css'/>
	</head>
	<body>
	<?php
		include "function.php";
	?>
		<div id="form">
			<form action = '1_4.php' method = 'POST'>
				<input id="number" name="number" type="text" autocomplete="off"/>
				<input type="submit" name="calculate" />
				<div><span class='text'>Достоинство карты:</span><div class ="res"><?=getTitle($_POST['number'])?></div></div>
				<div><span class='text'>Номер карты:</span><div class ="res"><?=$_POST['number']?></div></div>
			</form>
		</div>
	</body>
</html>

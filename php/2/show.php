<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel= 'StyleSheet' type = 'text/css' href='style.css'/>
	</head>
	<body>
<?php
	require_once( "classes\Circle.php" );
	require_once( "classes\Rectangel.php" );
	require_once( "classes\Triangel.php" );
	session_start();
	if(empty($shape))
		$shape = $_SESSION['shape'];	
	
	if(!empty($_POST['x'])|| !empty($_POST['y'])){
		$shape->move($_POST['x'], $_POST['y']);
	}
	
	if(!empty($_POST['size'])){
		$shape->editSize($_POST['size']);
	}
	
	if(isset($_POST['radius']) && !empty($_POST['radius'])){
		$shape->editRadius($_POST['radius']);
	}
	
	$shape->show();
?>
<div id="images">
	<img src="Shape.png"/>
</div>
<div id="form">
	<form action = 'show.php' method = 'POST'>
		<input id="x" name="x" type="text" autocomplete="off" placeholder="Введите х"/></br>
		<input id="y" name="y" type="text" autocomplete="off" placeholder="Введите y"/></br>
		<?php 
			if($shape instanceof Circle){
				echo '<input id="radius" name="radius" type="text" autocomplete="off" placeholder="Введите radius"/></br>';
			} 
		?>
		<div><span class='text'>Площадь:</span><div class ="res"><?=$shape->calculateArea()?></div></div>
		<span>Масштаб:</span><select name=size size=1>
					<option value='' >...</option>
					<option value=0.25 >0.25</option>
					<option value=0.5 >0.5</option>
					<option value=1.0 >1.0</option>
					<option value=1.5 >1.5</option>
					<option value=2.0 >2.0</option>
					<option value=2.5 >2.5</option>
				</select></br>
				
			
		<input type="submit" name="calculate" value='Изменить'/>
	</form>
</div>
</body>
</html>







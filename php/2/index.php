<?php
session_start();
?>
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
		$shape = null;
		
		if (!empty($_POST['Circle'])){
			$shape = new Circle($_POST['xCircle'], $_POST['yCircle'], $_POST['radius']);
			unset($_POST['Circle']);	
		}
		if (!empty($_POST['Triangel'])){
			$shape = new Triangel($_POST['xTriangel'], $_POST['xTriangel'] );
			unset($_POST['Triangel']);	
		}
		
		if (!empty($_POST['Rectangel'])){
			$shape = new Rectangel($_POST['xRectangel'], $_POST['xRectangel']);			
			unset($_POST['Rectangel']);							
		}
			
		if(!empty($shape)){
			$_SESSION['shape'] = $shape;
			header("Location: show.php");
			exit;
		}
	?>
		<div id="form">
			<form action = 'index.php' method = 'POST'>
				<input id="x" name="xCircle" type="text" autocomplete="off" placeholder="Введите х"/></br>
				<input id="y" name="yCircle" type="text" autocomplete="off" placeholder="Введите y"/></br>
				<input id="radius" name="radius" type="text" autocomplete="off" placeholder="Введите radius"/></br>
				<input type="submit" name="Circle" value='Нарисовать окружность'/></br>
				<input id="x" name="xTriangel" type="text" autocomplete="off" placeholder="Введите х"/></br>
				<input id="y" name="yTriangel" type="text" autocomplete="off" placeholder="Введите y"/></br>
				<input type="submit" name="Triangel" value='Нарисовать треугольник'/></br>
				<input id="x" name="xRectangel" type="text" autocomplete="off" placeholder="Введите х"/></br>
				<input id="y" name="yRectangel" type="text" autocomplete="off" placeholder="Введите y"/></br>
				<input type="submit" name="Rectangel" value='Нарисовать прямоугольник'/></br>
			</form>
		</div>
	</body>
</html>

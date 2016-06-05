<!DOCTYPE HTML>
<html>
<body>
<?php
	require_once("CalculateDate.php");
	$a = new CalculateDate();
	$time = 0;
	
	if(!empty($_POST['user_date'])){
		$time = $_POST['user_date'];
		unset($_POST['user_date']);
	}	
	$a::calculateDate($time);
?>

<form action="2.php" method="post">
	¬ведите дату и врем€: <input type="datetime-local" name="user_date" />
	<input type="submit" />
</form>

</body>
</html>
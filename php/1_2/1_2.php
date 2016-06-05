<html>
	<head>
		<link rel= 'StyleSheet' type = 'text/css' href='style.css'/>
	</head>
	<body>
	<?php
	
	function editName() {
		$name = $_POST['name'];
		list ($lastName, $middleName, $firstName) = explode(" ", $name);
		
		return $lastName." ".substr($middleName, 0, 1).". ".substr($firstName, 0, 1).".";
	}	

	?>
		<div id="form">
			<form action = '1_2.php' method = 'POST'>
				<input id="name" name="name" placeholder="Enter number..." type="text"/>				
				<input id='rename' type='submit' value='Rename' class='button' name='renamе'/> 
				<div><span class="text">Rename:</span><div id ="res"><?=editName()?></div></div>
				
			</form>
		</div>
	</body>
</html>


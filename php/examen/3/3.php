<html>
	<body>
<?php
	function antiSpam($text){
		$matches = array();
		if(!empty($text)){
			$pattern = '/(?:(?:http[s]?:\/\/)|(?:ftp:\/\/))(?:[0-9a-z\-_]+\.)[0-9a-z]{2,4}/'; 
			$list = explode("\n", $text);
			$matches = preg_grep($pattern,$list);
		}
		return count($matches);
	}
	
	$numberOfLinks = antiSpam($_POST['textarea']);
	echo $numberOfLinks;
	unset($_POST['textarea']);
?>
		<form action="3.php" method="post">
			 <textarea rows="10" cols="45" name="textarea"></textarea>
			<input type="submit" />
		</form>
	</body>
</html>
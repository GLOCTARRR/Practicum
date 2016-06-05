<html>
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link rel= 'StyleSheet' type = 'text/css' href='style.css'/>
		</head>
	<body>
		
<?php

function createPageContent($content){
	$matches = array();
	$quantity = 0;
	$pattern = '/<[hH](2)>(.*)<\/[hH]2>/';
	preg_match_all($pattern, $content, $matches);
	
	$pageContent = '<div><h1>Содержание</h1><ul>';
	
	for($i = 0; $i < count($matches[0]); $i++){		
		$pageContent .= '<a href="#id{'.$quantity.'}"><li>'.$matches[2][$i].'</li></a>';
		$content=str_replace($matches[0][$i],'<h2 id="id{'.$quantity.'}">'.$matches[2][$i].'</h2>',$content);
		$quantity++;
	}	
	
	$pageContent .= '</ul></div></br>';
	echo $pageContent;
	echo $content;
}

$fileData = '';
	$fd = fopen( 'content.html', 'r');
if (!$fd)   {
	echo "Error! Could not open the file.";
	die;
}
while  (! feof($fd))   {
	$fileData .= fgets($fd,  5000);
}
fclose ($fd);

createPageContent($fileData);

?>
	</body>
</html>
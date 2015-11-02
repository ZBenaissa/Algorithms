<html>
<head>
<title>ShortestPath</title>
</head>

<body>

<?php
$numbnodes = $_POST["numbnodes"];
$nodes = $_POST["nodes"];
echo "<form method='post' action='setlinks.php'>";
for ($i = 0; $i < count($nodes); $i++){
	echo "<h2>".$nodes[$i]."</h2>";
	$start = $nodes[$i];
	for ($j = 0; $j < count($nodes); $j++){
		if ($i != $j){
			echo "<p>".$start." to ".$nodes[$j]."<input type='text' name='links[$i][]'></p>";
		}
		else{
			echo "<input type='hidden' name='links[$i][]' value='0'>";
		}
			
	}
}
for ($i=0; $i<count($nodes); $i++){
	echo "<input type='hidden' name='nodes[]' value='$nodes[$i]'>";
}
echo "<input type='hidden' name='numbnodes' value='$numbnodes'>";
echo "<input type='submit' value='Click'>";

	
?>

</body>
</html>

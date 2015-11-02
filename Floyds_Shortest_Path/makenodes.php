<html>
<head>
<title>ShortestPath</title>
</head>

<body>

<?php
$numbnodes = $_POST["numbnodes"];
echo "<form method='post' action='setnodes.php'>";
for ($i = 0; $i < $numbnodes; $i++)
{
	$j=$i+1;
	echo "<p>node ".$j.":"."<input type='text' name='nodes[]'></p>";
}
echo "<input type='hidden' name='numbnodes' value='$numbnodes'>";
echo "<input type='submit' value='Click'>";
?>

</body>
</html>

<?php 


$name = "Rabin";
$class = "BSC it";
$rool = "140220";

$name = array($name,$class,$rool);
print_r($name);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script>
		function ajax_post()
		{
			var hr = new XMLHttpRequest(); 
			var url = "insert.php";
			var fn = document.getElementById("first_name").value;
			var ln = document.getElementById("last_name").value;
			var vars = "firstname="+fn+"&lastname="+ln;
			hr.open("POST",url,true);

			hr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

			hr.onreadystatechange = function()
			{
				if (hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;
					document.getElementById("status").innerHTML = return_data;
				}
			}

			hr.send(vars);
			document.getElementById("status").innerHTML = "Processing......";

		}
	</script>
</head>
<body>
	<h2>ajax request</h2>
	<input type="text" id="first_name" name="first_name">
	<br/>
	<input type="text" id="last_name" name="last_name">
	<input type="submit" value="submit" name="myBtn" onclick="ajax_post()">

	<div id="status">
		
		<table border=\"1\">
		<tr><td>name</td>
		<td>location</td>
		<td>Opion</td>
		</tr>
		<?php 
		$con = mysqli_connect("localhost", "root", "", "db_reccoon_review"); 
		$query = mysqli_query($con,"select * from example");
		while($row = mysqli_fetch_assoc($query)) { 

		echo "<tr>
			<td>".$row['name']."</td>
			<td>".$row['location']."</td>
			</tr>";
 } echo "</table>";?>

	</div>
</body>
</html>
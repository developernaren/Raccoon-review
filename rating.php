<?php 

$con = mysqli_connect("localhost", "root", "", "db_reccoon_review");

$query = mysqli_query($con,"select rating from review where raccoon_id = 1");
while($row = mysqli_fetch_assoc($query))
{
	$nums[] = $row['rating'];
}
foreach ($nums as $value) {
	echo $value;
}


?>
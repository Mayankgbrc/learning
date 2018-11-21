<!DOCTYPE html>
<html>
<head>
	<title>E-learning</title>
	<link rel="stylesheet" href="w3.css" />
</head>
<body>
	<?php 
	$conn = new mysqli("localhost","root","","learning");
	?>
	<a href="index.php">Home</a>
	<a href="index.php?id=1/1">html</a>
	<a href="index.php?id=2/1">java</a>
	<a href="index.php?id=3/1">php</a>
	<a href="index.php?id=4/1">Python</a>
	<a href="index.php?id=5/1">Javascript</a>
	<a href="index.php?id=6/1">C</a>
	<a href="index.php?id=7/1">C++</a>
	<br>
	<?php 
	$term = $_SERVER['REQUEST_URI']; 
	if(strlen($term)>23){
		$cid = substr($term, 23,1);
		$did = substr($term, 25,1);
		$sql = "SELECT * FROM content WHERE cid='$cid' and did='$did'";
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
      	$row = mysqli_fetch_assoc($result);
      	if($count==1){
      		$topic = $row['topic'];
      		$body = $row['body'];
      	}
   		$sql2 = "SELECT * FROM content WHERE cid='$cid' order by did";
		$result2 = mysqli_query($conn,$sql2);
		?>
		<div class="w3-row">
			<div class="w3-col l3">
		<?php
      	while ($row2 = mysqli_fetch_assoc($result2)){
      		$txt = "index.php?id=".$row2['cid']."/".$row2['did'];
      		echo "<a href='$txt'><h4>".$row2['topic']."</h4></a>";
      	}
      	?>
      		</div>
      		<div class="w3-col l6">
      	<?php
      	echo "<h1>".$topic."</h1>";
      	echo $body;
      	echo "</div>";
	}
	else{
		echo "Empty";
	}

	?>
</body>
</html>
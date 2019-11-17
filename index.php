<?php

	require_once "database.php";
	require_once "function.php";

	$hotDogs = getAllHotDog($link);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Main</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Saira+Stencil+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
</head>
<body>
	<h3>Hi, human. You can create a hot dog!</h3>
	<a href="forms/create.html" class="btn create">Create hot dog</a>
	<table>
		<tr>
			<th>Number</th>
			<th>Hot dog</th>
			<th>Date</th>
			<th colspan="2">Action</th>

		</tr>
		<?php foreach ($hotDogs as $hotDog) { ?>
			<tr>
				<td><?php echo $hotDog['id'];?></td>
				<td><?php echo $hotDog['composition'];?></td>
				<td><?php echo $hotDog['time_create']?></td>
				<td><a href="controller.php?del=<?php echo $hotDog['id'];?> " class="btn">Delete</a></td>
				<td><a href="controller.php?update=<?php echo $hotDog['id']?>" class="btn">Change</a></td>
			</tr>	
		<?php } ?>
	</table>
</body>
</html>
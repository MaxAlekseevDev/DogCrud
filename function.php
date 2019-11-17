<?php

function refresh($page){
	header("Location: /$page");
	exit;
}

function getAllHotDog($link)
{

	$sql = "SELECT * FROM products";
	$resultOfSelect = mysqli_query($link, $sql);
	$result = [];

	while ($rows = mysqli_fetch_array($resultOfSelect)) {
	    array_push($result, $rows);
	}

	return $result;
	mysqli_close($link);
}

function createHotDog($link, $kind, $sausage, $sauce)
{

	$kind = mysqli_escape_string($link, $kind);
	$sausage = mysqli_escape_string($link, $sausage);
	$sauce[0] = mysqli_escape_string($link, $sauce[0]);
	$sauce[1] = mysqli_escape_string($link, $sauce[1]);

	$hotdog = "The type of hot dog - $kind, with $sausage sausage/-s and sauce: $sauce[0]  $sauce[1] . ";
	$sql = "INSERT INTO products (composition, time_create) VALUES ('$hotdog', NOW())";
	$result = mysqli_query($link, $sql);

	return $result;
	mysqli_close($link);
}

function deleteHotDog($link, $id)
{

	$id = mysqli_escape_string($link, $id);
	$sql = "DELETE FROM products WHERE id = '$id'";
	$resultOfDelete = mysqli_query($link, $sql);
	return $resultOfDelete;
	mysqli_close($link);
}

function getHotDog($link, $id)
{

	$id = mysqli_escape_string($link, $id);
	$sql = "SELECT * FROM products WHERE id = '$id'";
	$result = mysqli_query($link, $sql);
	$result = mysqli_fetch_array($result);
	return $result;
	mysqli_close($link);
}

function updateHotDog($link, $kind, $sausage, $sauce, $id)
{

	$kind = mysqli_escape_string($link, $kind);
	$sausage = mysqli_escape_string($link, $sausage);
	$sauce[0] = mysqli_escape_string($link, $sauce[0]);
	$sauce[1] = mysqli_escape_string($link, $sauce[1]);
	$id = mysqli_escape_string($link, $id);
	
	$hotdog = "The type of hot dog - $kind, with $sausage sausage/-s and sauce: $sauce[0]  $sauce[1] . ";
	$sql = "UPDATE products SET composition = '$hotdog', time_create = NOW() WHERE id = '$id'";
	$result = mysqli_query($link, $sql);

	return $result;
	mysqli_close($link);
}
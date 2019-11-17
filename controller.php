<?php
session_start();
require_once 'database.php';
require_once 'function.php';

$kind = $_POST['kind'];
$sausage = $_POST['sausages'];
$sauce = $_POST['sauce'];


if (isset($_POST) && $_POST['create'] == "Create") {
	$resultOfCreate = createHotDog($link, $kind, $sausage, $sauce);

	if($resultOfCreate) {
		refresh('index.php');
	}else{
		refresh('forms/create.html');
	}

}elseif(isset($_GET['del'])){
	$resultOfDelete = deleteHotDog($link, $_GET['del']);

	if($resultOfDelete){
		require_once "index.php";
	}
	

}elseif(isset($_GET['update'])){
	$hotDog = getHotDog($link, $_GET['update']);
	echo $hotDog['composition'];
	$_SESSION['id']= $hotDog['id'];
	require_once "forms/update.html";
	
	
}elseif(isset($_POST) && $_POST['update'] == "Update"){
	
	$resultOfUpdate = updateHotDog($link, $kind, $sausage, $sauce, $_SESSION['id']);
	
	if($resultOfUpdate) {
		require_once "index.php";
	}else{
		refresh('forms/update.html');
	}
}


<?php

define("HOST", "127.0.0.1");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "eliftech");

$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if(!$link) {
	echo "Not connect to DB." . mysqli_connect_error();
}

mysqli_set_charset($link, "utf8");

global $link;
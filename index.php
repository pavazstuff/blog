<?php

$a = "localhost";
$b = "root";
$c = "";
$d = "notas";

$con = mysql_connect($a, $b, $c);
mysql_select_db($d);

function page_article($con){

	if(isset($_GET['id_article']))
		$id = $_GET['id_article'];
	else 
		$id = 1;
	
	$sql = "SELECT * FROM `articulos` WHERE id_articulos = ${id}";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);

	$sql2 = "SELECT * FROM `articulos` WHERE 1 ORDER BY id_articulos DESC";
	$result2 = mysql_query($sql2);

	include 'article.html';
}

function page_index($con){

	$sql2 = "SELECT * FROM `articulos` WHERE 1 ORDER BY id_articulos DESC";
	$result2 = mysql_query($sql2);

	include 'home.html';
}

function page_new(){
	include 'new.html';
}

function page_create($con){

	if(isset($_POST['title']) && isset($_POST['article']) && isset($_POST['date']) && isset($_POST['tags'])){
		$title   = $_POST['title'];
		$article = $_POST['article'];
		$date    = $_POST['date'];
		$tags    = $_POST['tags'];

		$sql = "INSERT INTO `notas`.`articulos` (`id_articulos`, `entrada`, `publicacion`, `fecha`, `etiquetas`) VALUES (NULL, '${title}', '${article}', '${date}', '${tags}')";
		mysql_query($sql);
	}else{
		echo "Forbiddem 403..\n<a href='index.php'>back to home</a>";
	}
	header("Location: index.php?page=index");
}

switch($_GET['page']){
	case "index": page_index($con);
	break;
	case "article": page_article($con);
	break;
	case "new": page_new();
	break;
	case "create": page_create($con);
	break;
	default: header("Location: index.php?page=index");
	break; 
}

?>
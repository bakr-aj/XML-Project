<?php

$xml = new DOMDocument;
$xml->load("file.xml");
$ISBN = $_POST['book'];
var_dump($ISBN);
$book = $xml->getElementById("_" . $ISBN);
var_dump($book);
$library = $xml->getElementsByTagName("library");
$library->item(0)->removeChild($book);

$xml->save("file.xml");
header("Location: booklist.php");

<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
<?php

$xml = new DOMDocument;
$xml->load("file.xml");

$book = $xml->createElement("book");
$book->setAttribute("ISBN", "_".$_POST['ISBN']);
$authors = split(" ", $_POST['authors']);
$authorsIDs="";
foreach ($authors as $author) {
    if($xml->getElementById("_".$author)){
         $authorsIDs .="_".$author." ";
    }
   
}
$book->setAttribute("authors",$authorsIDs);
$title = $xml->createElement("title", $_POST['title']);
$bookYear = $xml->createElement("year", $_POST['year']);
$publisher = $xml->createElement("publisher", $_POST['publisher']);
$book->appendChild($title);
$book->appendChild($bookYear);
$book->appendChild($publisher);

$library = $xml->getElementsByTagName("library");
$library->item(0)->appendChild($book);
$xml->save("file.xml");
$books = $xml->getElementsByTagName("book");
foreach ($books as $one){
    echo $one->textContent;
    echo '<br>';
}
header("Location: booklist.php");
echo "<a class='btn ' href='addBook.html'>Back</a>";
?>
</html>
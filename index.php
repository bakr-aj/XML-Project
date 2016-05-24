<html>
    <head>
        <title>DB Project</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="text-center container">
            <div>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html">DB2</a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li ><a href="addBook.php">Add Book <span class="sr-only">(current)</span></a></li>
                                <li><a href="index.html">Search</a></li>
                                <li><a href="deleteForm.php">delete</a></li>
                                <li><a href="booklist.php">Book list</a></li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
            <div class=" jumbotron">
                <h3>XML Project</h3>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Info</h3>
                </div>
                <div class="panel-body">



                    <?php
                    $xml = new DOMDocument;
                    $xml->load("file.xml");

                    $type = $_POST['selectType'];
                    $valid = $xml->validate();

                    if ($valid) {
                        $query = $_POST['query'];
                        switch ($type) {
                            case "ISBN":
                                byISBN("_" . $query, $xml);
                                break;
                            case "title":
                                byTitle($query, $xml);
                                break;
                            case "authorID":
                                byAuthor("_" . $query, $xml);
                                break;
                            case "authorName":
                                byAuthorName($query, $xml);
                                break;
                            default :
                                echo "No result for this query";
                        }
                    } else {
                        echo "the document is not valid";
                    }
                    

//functions 
                    function byISBN($id, $xml) {

                        $res = $xml->getElementById($id);
                        if ($res) {
                            echo " $res->textContent <br>";
                            $authors = $res->getAttribute("authors");
                            $authors = split(" ", $authors);
                            foreach ($authors as $author) {
                                $book_author = $xml->getElementById($author);
                                if ($book_author) {
                                    echo "Author info :";
                                    echo $book_author->textContent;
                                    //echo "</div> </div>";
                                }
                            }
                        }
                    }

                    function byTitle($query, $xml) {
                        $res = $xml->getElementsByTagName("title");
                        foreach ($res as $title) {
                            $string = $title->textContent;
                            $pat = "*" . $query . "*";
                            if (preg_match(strtolower($pat), strtolower($string)) > 0) {
                                $parent = $title->parentNode;
                                $ISBN = $parent->getAttribute('ISBN');
                                //echo $ISBN;
                                byISBN($ISBN, $xml);
                            }
                        }
                    }

                    function byAuthor($ID, $xml) {
                        $books = $xml->getElementsByTagName("book");
                        foreach ($books as $book) {
                            $authors = split(" ", $book->getAttribute("authors"));
                            foreach ($authors as $author) {
                                if ($author == $ID) {
                                    //byISBN($book->getAttribute("ISBN"), $xml);
                                   echo " $book->textContent <br>"; 
                                   
                                }
                            }
                        }
                         
                    }

                    function byAuthorName($query, $xml) {
                        $res = $xml->getElementsByTagName("lastName");
                        foreach ($res as $lastName) {
                            $string = $lastName->textContent;
                            $pat = "*" . $query . "*";
                            if (preg_match(strtolower($pat), strtolower($string)) > 0) {
                                $parent = $lastName->parentNode;//the parent will be the author 
                                $ID = $parent->getAttribute('id');
                                //echo $ISBN;
                                byAuthor($ID, $xml);
                            }
                        }
                    }
                    echo "</div> </div>";
                    echo "<a href='index.html'>Back</a>";
                    ?>
                    
                </div>
                </body>
                </html>

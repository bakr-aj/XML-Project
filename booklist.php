<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
                                <li><a href="booklist.php">Book List</a></li>
                            </ul>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <div class=" jumbotron">
                <h3>XML Project</h3>
            </div>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Title</th>

                        <th>Year</th>

                        <th>Publisher</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $xml = new DOMDocument;
                    $xml->load("file.xml");
                    $books = $xml->getElementsByTagName("book");

                    foreach ($books as $book) {
                        $childrens = $book->childNodes;
                        echo '<tr>';
                        $isbn = $book->getAttribute('ISBN');
                        $isbn = substr($isbn, 1);
                        echo "<td>$isbn</td>";
                        foreach ($childrens as $children) {
                            if ($children->nodeName != "#text") {
                                echo "<td>$children->textContent</td>";
                            }
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
           
        </div>
    </body>


</html>

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
            <div class="jumbotron">
                <h3>XML Project</h3>
            </div>
            <form class="form-horizontal" method="post" action="deleteitem.php">
                <div class="form-group">
                    <label class="control-label">Delete Book</label>
                </div>
                <div class="form-group">
                    <?php ?>
                    <select class="form-control" name="book">
                        <?php
                        $xml = new DOMDocument;
                        $xml->load("file.xml");
                        $books = $xml->getElementsByTagName("book");

                        foreach ($books as $book) {
                            $ISBN = $book->getAttribute("ISBN");
                            $ISBN = substr($ISBN, 1);
                            echo "<option>$ISBN</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-default form-control" type="submit"> submit</button>
                </div>
            </form>
        </div>
    </body>
</html>



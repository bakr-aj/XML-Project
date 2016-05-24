<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                                <li><a href="booklist.php">Book List</a></li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
            <div class="jumbotron">
                <h3>XML Project</h3>
            </div>

            <form class="form-horizontal" method="post" action="addItem.php">
                <div class="form-group">
                    <label class="control-label">Add New Book</label>
                </div>
                <div class="form-group">
                    <label class="control-label">Book ISBN</label><input class="form-control" required name="ISBN" type="number">
                    <label class="control-label">Book Authors</label><input class="form-control" required name="authors" type="text">
                    <label class="control-label">Book Title</label><input class="form-control" required name="title" type="text">
                    <label class="control-label">Book Year</label><input class="form-control" name="year" type="date">
                    <label class="control-label">Book Publisher</label><input class="form-control" name="publisher" type="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-default form-control" type="submit"> submit</button>
                </div>
            </form>
        </div>
    </body>
</html>

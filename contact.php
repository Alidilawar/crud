<?php
        //Connection to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "notes";

        //Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>iNotes - Notes taking made easy</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/crud">iNotes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/crud">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/crud/about.php">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/crud/contact.php">Contact Me <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $Tellus = $_POST['Tellus'];     
        $concern = $_POST['concern'];   

        //Die if connection was not successful
      if (!$conn) {
        die("Sorry we failed to connect: ". mysqli_connect_error());
      }
                   
      else {       
                // Submit these to a database
                // Sql query to be executed   

            // $sql = "INSERT INTO `contact us` (`Name`, `Email`, `Concern`, `DT`) VALUES ('$name', '$email', '$desc', current_timestamp())";
            //  $sql = "INSERT INTO `contact us` (`Name`, `Email`, `Tell us about`, `Concern`, `DT`) VALUES ('$name', '$email', '$Tellus', '$concern', current_timestamp())";  

             $sql = "INSERT INTO `contact us` (`Name`, `Email`, `Tell us about`, `Concern`, `DT`) VALUES ('$name', '$email', '$Tellus', '$concern', current_timestamp())";

              $result = mysqli_query($conn, $sql);
          
          
          if($result){
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your entry has been submitted successfully!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>'; 
            }
            else{
                // echo "The record was not inserted Successfully because of this error ---> ". mysqli_error($conn);
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';

            }
        }     
 }
?>

    <div class="container my-4 mb-5">
        <h2 class="container my-4">Contact us for your concerns</h2>
        <form action="/crud/contact.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="your name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>


            <div class="form-group">
                <label for="Tellus">Tell us About yourself</label>
                <textarea class="form-control" id="Tellus" name="Tellus" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="concern">Eleborate your Concern</label>
                <textarea class="form-control" id="concern" name="concern" rows="3"></textarea>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

        <hr class="featurette-divider">
    </div>

    <footer>
        <p class="mb-0 text-center">© 2020-2021 iNotes.com Pvt.Ltd</p>
        <p class="mb-0 text-center">
            <a href="#">Back to top</a>
        </p>

    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php

// Checking if the session is set on login page
// without loggin in user can't access the homepage
session_start();
print_r( $_SESSION );

if ( !isset( $_SESSION['username'] ) ) {
    header( "location:./login.php" );
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome Page</title>
</head>

<body>

    <div class="contianer">
        <div class="row justify-content-center">
            <div class="col-md-5 text-center">
                <h1 class="text-center text-primary my-5">Welcome

                    <!--                Printing username from the session-->
                    <?php echo $_SESSION['username']; ?>
                </h1>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
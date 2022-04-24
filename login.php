<?php

$login   = 0;
$invalid = 0;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once "connect.php";

    // getting form data from the form methods prop should be match to the database column name.
    $username = $_POST['username'];
    $password = $_POST['password'];

    // checking if the user exists
    $sql    = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query( $con, $sql );

    if ( $result ) {
        $num = mysqli_num_rows( $result );

        if ( $num > 0 ) {
//            echo "Login Successful";
            $login = 1;

            session_start();
            $_SESSION['username'] = $username;
            header( "location:./home.php" );

        } else {
//            echo "Invalid Data";
            $invalid = 1;
        }

    }

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

    <title>Login</title>
</head>

<body>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center">Login here</h1>

                <!--            Login Successful-->
                <?php

if ( $login ) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <p> Login Successful.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

?>
                <!--            Invalid User message-->
                <?php

if ( $invalid ) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> Invalid Username or Password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

?>

                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="username" id="name" type="text" class="form-control"
                            placeholder="Enter your username" ">
                </div>
                <div class=" mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" id="password" type="password" class="form-control"
                            placeholder="Enter your password">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
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
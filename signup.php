<?php

// Error Message Variable
$success = 0;
$user    = 0;
$invalid = 0;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once "connect.php";

    // getting form data from the form methods prop should be match to the database column name.
    $username      = $_POST['username'];
    $password      = $_POST['password'];
    $cpassword     = $_POST['cpassword'];
    $hash_password = password_hash( $password, PASSWORD_DEFAULT );

// rough approach

/*
$sql = "INSERT INTO registration (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($con, $sql);

if($result){

echo "Data Inserted Successfully";

}else{

die(mysqli_error($con));

}
 */

    // checking if the user already exists
    $sql    = "SELECT * FROM registration WHERE username = '$username'";
    $result = mysqli_query( $con, $sql );

    if ( $result ) {
        $num = mysqli_num_rows( $result );

        if ( $num > 0 ) {
//            echo "User already exist";
            $user = 1;
        } else {

// Password Veryfying
            if ( $password === $cpassword ) {
                // If the user doesn't exist then we are adding the user
                $sql    = "INSERT INTO registration (username, password) VALUES ('$username', '$hash_password')";
                $result = mysqli_query( $con, $sql );

                if ( $result ) {
//                echo "Signup Successful";
                    $success = 1;
                    header( "location:./login.php" );
                }

            } else {

//Password didn't match message
//                die(mysqli_error($con));
                $invalid = 1;
            }

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

    <title>Sign Up</title>
</head>

<body>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center">Sign Up here</h1>

                <!--            User Already Exsit message-->
                <?php

if ( $user ) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oh No sorry!</strong> User already exist.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

?>

                <!--            User Added Message-->
                <?php

if ( $success ) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hoody!</strong> Signup Successful.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

?>

                <!--            Unmatched Password Message-->
                <?php

if ( $invalid ) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Password</strong> didn\'t match in your text.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

?>
                <form action="signup.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input name="username" type="text" class="form-control" placeholder="Enter your username" ">
                </div>
                <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input name="cpassword" type="password" class="form-control" placeholder="Confirm password">
                    </div>

                    <button type="submit" class="btn btn-primary">Sign Up</button>
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
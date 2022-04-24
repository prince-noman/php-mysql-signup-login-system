 <?php


// Session destroying after clicking logout button from the Homepage
 // And redirect the user to the login page
     session_start();
     session_destroy();
     header("location:./login.php");

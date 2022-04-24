<?php

// Database Details
define( 'HOSTNAME', 'localhost' );
define( 'USERNAME', 'root' );
define( 'PASSWORD', '' );
define( 'DB', 'singupforms' );

// Connecting to the Database
$con = new mysqli( HOSTNAME, USERNAME, PASSWORD, DB );

// Check Approach

/*
if($con){

echo "Connection Successful";

}else{

die(mysqli_error($con));

}
 */
if ( !$con ) {
    die( mysqli_error( $con ) );
}
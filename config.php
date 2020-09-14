<?php
$server = "192.168.0.18";
$username = "admin";
$password = "123456";
$dir = "/";
// Connection
$con = ftp_connect($server);
if($con == false){
    echo "Could not connect to FTP server\n";
    die();
}

// Authentication
if(ftp_login($con, $username, $password) == false){
    echo "Authentication failed\n";
    die();
}
?>
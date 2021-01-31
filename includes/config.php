<?php
// database connection
$conn = mysqli_connect("localhost", "root", "", "guestbook") or die("Can't Connect...");
// start session 
session_start();
// create csrf token
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
?>
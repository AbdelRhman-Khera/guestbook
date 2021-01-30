<?php
// database connection
$conn = mysqli_connect("localhost", "root", "", "guestbook") or die("Can't Connect...");

session_start();
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
?>
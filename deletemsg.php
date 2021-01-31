<?php
require('includes/config.php');
    $id=$_GET['sid'];
    $q="select * from msgs where id='$id'";
    $res=mysqli_query($conn,$q) or die("wrong query");
    $row=mysqli_fetch_assoc($res);
    if ($row['user_id'] == $_SESSION['u_id']) {
    // delete the record from database by id
    $query="delete from msgs where id =".$_GET['sid'];
    mysqli_query($conn,$query) or die("Can't Execute Query...");
    }
    
    header("location:index.php");

?>
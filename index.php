<?php
session_start();
$conn = mysqli_connect('localhost','root','','evlabcms') or die ('Unable to Connect');

if (isset($POST['login'])){
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $select = mysqli_query($conn, "SELECT * FROM evlabcms WHERE userid = '$userid' AND password ='$password'");
    $row = mysqli_fetch_array($select);
    
    if (is_array($row)){
        $_SESSION["userid"] = $row['userid'];
        $_SESSION["password"] = $row['password'];
    }
    else{
        echo '<script type = text/javascript >';
        echo 'alert("Invalid Username/Password")';
        echo 'window.location.href="index.html"';
        echo '</script>';
    }
}
?>
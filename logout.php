<?php 
@header("content-type:text/html;charset=utf8");
session_start();
session_unset();
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),session_id(),time()-10);
}
session_destroy();
header("location:login.php");

?>
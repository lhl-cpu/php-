<?php
    @header("content-type:text/html;charset=uft8");
    $conne = mysql_connect("localhost","root","");
    if (!$conne) { 
        die('数据库连接失败'. mysql_error()); 
    } 
    $select = mysql_select_db("news",$conne);
    $utf = mysql_query("set names utf8");

    $username= $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $arrays = array(array("one"=>'repeat','two'=>'success'));
    $sql  = mysql_query("select count(*) from user where username='$username'");
    $row = mysql_fetch_row($sql);
    $num = $row[0];
    //判断用户名是否已经被注册了
    if($num == 1){
        //被注册返回repeat
        echo json_encode($arrays[0]['one']);
    }else{
        mysql_query("insert into user (username,password) values('{$username}','{$password}')");
        session_start();
        $_SESSION['username']=$username;
        echo json_encode($arrays[0]['two']);
    }
?>
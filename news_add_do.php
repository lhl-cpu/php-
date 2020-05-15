<?php

@header("content-type:text/html;charset=utf8");

$link = mysql_connect('localhost','root','');
if (!$link) { 
    die('数据库连接失败'. mysql_error()); 
} 
mysql_query('set names utf8');
mysql_select_db('news',$link);


if($_POST['news_name']!=""&& $_POST['news_intro']!="")
{

    $name = $_REQUEST['news_name'];
    $intro = $_REQUEST['news_intro'];
    date_default_timezone_set("Asia/Shanghai");
    $datetime = date('y-m-d h:i:sa');

    $str = "insert into news (n_name,n_intro,n_createtime) values ('$name','$intro','$datetime')";
    $rs = mysql_query($str);
    if(mysql_affected_rows()>0){
        echo "<script>alert('添加新闻成功');window.location='news_add.php'</script>";
    }else{
        echo "<script>alert('添加新闻失败');window.location='news_add.php'</script>";
    }

}else{
    echo "<script>alert('请输入新闻信息');window.location='news_add.php'</script>";
}
mysql_close($link);
?>
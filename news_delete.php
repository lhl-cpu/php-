<?php
@header("content-type:text/html;charset=utf8");

$link = mysql_connect('localhost','root','');
if (!$link) { 
    die('数据库连接失败'. mysql_error()); 
} 
mysql_query('set names utf8');
mysql_select_db('news',$link);

if($_GET["id"] !="" )
{
    $nid = $_GET["id"];
    $str = "delete from news where id=".$nid;
    $del = mysql_query($str);
    if($del)
    {
        echo "<script>window.location='news_list.php';</script>";
    }
    else
    {
        echo "<script>alert('对不起，新闻信息删除失败！');window.location='news_list.php';</script>";
    }
}
else
{
    echo "<script>alert('请重新选择要删除的新闻信息');window.location='news_list.php';</script>";
}
mysql_close($link);
?>
<?php
@header("content-type:text/html;charset=utf8");

$link = mysql_connect('localhost','root','');
if (!$link) { 
    die('数据库连接失败'. mysql_error()); 
} 
mysql_query('set names utf8');
mysql_select_db('news',$link);

$nid = $_POST["news_id"];
if($_POST["news_name"]!="" || ($_FILES["news_intro"]!=""))
{
    $name = $_POST["news_name"];
    $intro = $_POST["news_intro"];

    date_default_timezone_set("Asia/Shanghai");
    $datetime = date('y-m-d h:i:sa');

    $str = "update news set n_name= '$name',n_intro='$intro',n_createtime='$datetime' where id=$nid";
    $result = mysql_query($str);
    if(mysql_affected_rows()>0)
    {
        echo "<script>alert('新闻信息修改成功！');window.location='news_add.php';</script>";
    }else
    {
        echo "<script>alert('新闻信息修改失败！');window.location='news_update.php';</script>";
    }
}else
{
    echo "<script>alert('请修改新闻');window.location='news_update.php?id=$nid';</script>";
}
mysql_close($link);
?>

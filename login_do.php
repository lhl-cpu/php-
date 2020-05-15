<?php 
@header("content-type:text/html;charset=utf8");
$username = $_REQUEST['username'];
$pass = $_REQUEST['password'];

session_start();

$link = mysql_connect('localhost','root','');
if (!$link) { 
    die('数据库连接失败'. mysql_error()); 
} 
mysql_query('set names utf8');
mysql_select_db('news',$link);

$arrays = array(array('one'=>'nameerror','two'=>'passerror','three'=>'success'));
$sqlname = mysql_query("select count(*) from user where username= '$username'");
$row = mysql_fetch_row($sqlname);
$num = $row[0];
    //查看用户是否存在
if(!$num){
      //不存在返回nameerror
    echo json_encode($arrays[0]['one']);
    return;
}else{
    $sqlpass = mysql_query("select password from user where username='$username'");
        $passarray = mysql_fetch_row($sqlpass);//获得密码数组
        $passval = $passarray[0];//这里才是对应用户的密码
        //判断该用户的密码是否正确
        if($passval!=$pass){
            echo json_encode($arrays[0]['two']);
            return;
        }
    }
    //成功返回success
    $_SESSION['username']=$username;
    echo json_encode($arrays[0]['three']);
    mysql_close($link);
?>

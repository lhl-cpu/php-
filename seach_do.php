<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table{
            width: 80%;
            /* 只有定义了表格的布局算法为fixed，下面td的定义才能起作用。 */
            table-layout:fixed;
        }
        td{
         border: 1px solid black;
         /*超出部分隐藏*/
         overflow: hidden;
         /* 强制在同一行内显示所有文本，直到文本结束或者遭遇 br 对象。不换行 */
         word-break: keep-all;
         /* 内容超出宽度时隐藏超出部分的内容 */
         white-space:nowrap;
         /* 当对象内文本溢出时显示省略标记(...) ；需与overflow:hidden;一起使用。*/
         text-overflow:ellipsis
     }
     .footer{
       color: red;
       position: absolute;
       bottom: 0;
   }
</style>
</head>
<body>
    <table border="1" width="85%">
        <tr>
            <td>编号</td> <td>新闻名称</td><td>文章内容</td><td>发布时间</td><td>查看</td>
        </tr>
        <?php 

        @header("content-type:text/html;charset=uft8");
        $conne = mysql_connect("localhost","root","");
        if (!$conne) { 
            die('数据库连接失败'. mysql_error()); 
        } 
        $select = mysql_select_db("news",$conne);
        $utf = mysql_query("set names utf8");

        $findstr = $_POST['findstr'];

        $arr = mysql_query("select * from news where n_intro like '%$findstr%'");
        while($result1 = mysql_fetch_array($arr)){
            ?>
            <tr>
                <td> <?php echo $result1['id'];?> </td>
                <td> <?php echo $result1['n_name'];?> </td>
                <td> <?php echo $result1['n_intro'];?> </td>
                <td> <?php echo $result1["n_createtime"];?> </td>
                <td><a href="detail.php?id=<?php echo $result1["id"];?>">查看詳情</a></td>
            </tr>
            <?php 
        }
        ?>
    </table>
</body>
</html>

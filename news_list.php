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
    <table border="1">
        <tr>
            <td>编号</td> <td>新闻名称</td><td>文章内容</td><td>发布时间</td><td>编辑</td><td>删除</td>
        </tr>
        <?php
        @header("content-type:text/html;charset=utf8");

        $link = mysql_connect('localhost','root','');
        if (!$link) { 
            die('数据库连接失败'. mysql_error()); 
        } 
        mysql_query('set names utf8');
        mysql_select_db('news',$link);
    ////
        $page_size = 14;
        if(isset($_GET['page_current']))
        {
            $page_current = $_GET['page_current'];
        }else{
            $page_current = 1;
        }
        $start = ($page_current - 1)*$page_size;
        ////
        $arr2 = mysql_query("select * from news order by n_createtime desc,id desc limit $start,$page_size");
        while($result2 = mysql_fetch_array($arr2))
        {
            ?>
            <tr>
                <td> <?php echo $result2['id'];?> </td>
                <td> <?php echo $result2['n_name'];?> </td>
                <td> <?php echo $result2['n_intro'];?> </td>
                <td> <?php echo $result2["n_createtime"];?> </td>
                <td><a href="news_update.php?id=<?php echo $result2["id"];?>">编辑</a></td>
                <td><a href="news_delete.php?id=<?php echo $result2["id"];?>">删除</a></td>
            </tr>
            <?php 
        }
        ?>
    </table>
    <div class="footer">
        <?php
        $url = $_SERVER['PHP_SELF'];
        $rs_news = mysql_query("select * from news");
        $total_records = mysql_num_rows($rs_news);
        $total_pages = ceil($total_records/$page_size);
        $page_previous = ($page_current<=1)?1:$page_current-1;
        $page_next = ($page_current>=$total_pages)?$total_pages:$page_current+1;
        $page_next = ($page_next==0)?1:$page_next;

        $navigator = "<a href=$url?page_current=$page_previous>上一页</a>";
        $page_start = 0;
        $page_end = $total_pages;

        for($i=$page_start;$i<$page_end;$i++)
        {
            $j = $i+1;
            $navigator.="<a href='$url?page_current=$j'>$j</a>";
        }


        $navigator.="<a href=$url?page_current=$page_next>下一页</a><br/>";
        $navigator.="共".$total_records."条新闻，第".$page_current."页,共".$total_pages."页";
        echo $navigator;


        mysql_close($link);
        ?>
    </div>
</body>
</html>
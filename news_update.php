<body style="margin:0px 0px 0px 0px;">
  <?php
  @header("content-type:text/html;charset=utf8");

  $link = mysql_connect('localhost','root','');
  if (!$link) { 
    die('数据库连接失败'. mysql_error()); 
  } 
  mysql_query('set names utf8');
  mysql_select_db('news',$link);

  if($_GET["id"] !="")
  {
    $nid = $_GET["id"];
    $str = "select * from news where id=".$nid;
    $arr = mysql_query($str);
    $result = mysql_fetch_array($arr);
  }
  mysql_close($link);
  ?>

  <form action="news_update_do.php" method="post" enctype="multipart/form-data">
    <table border="1" width="100%">
      <tr>
        <td colspan="2" align="center">
          修改新闻信息
        </td>
      </tr>
      <tr>
        <td><font color="red">*</font>新闻名称：</td>
        <td><input type="text" name="news_name" value="<?php echo $result['n_name'] ?>" /></td>
      </tr>
      <tr>
        <td>新闻内容：</td>
        <td>
          <textarea name="news_intro" rows="20" cols="130"><?php echo $result['n_intro'] ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="hidden" name="news_id" value="<?php echo $result['id'] ?>" />
          <input type="submit" value="保存" />
        </td>
      </tr>
    </table>
  </form>
</body>
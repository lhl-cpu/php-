<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="news_add_do.php" method="post" enctype="multipart/form-data">
    <table border="1" width="100%" height="400px">
      <tr>
        <td colspan="2" align="center">
          添加新闻信息
        </td>
      </tr>
      <tr>
        <td>
          <font color="red">*</font>新闻名称：
        </td>
        <td><input type="text" name="news_name" /></td>
      </tr>
      <tr>
        <td>新闻内容:
        </td>
        <td>
          <textarea name="news_intro" rows="20" cols="130"></textarea>
        </td>
      </tr>

      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="保存" />
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
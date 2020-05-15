<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>新闻平台</title>
</head>

<body bgcolor="#EAEAEA" style="margin: 0 auto">
  <table border="1" style="width: 100%;">
    <tr>
      <td colspan="2" align="center" style="font-weight: 600;">新闻管理平台</td>
    </tr>
    <tr>
      <td colspan="2">
        <?php
        session_start();
        if ($_SESSION['username'] != "") {
          echo $_SESSION['username'] . "欢迎来到系统管理平台,";
          echo "<a href='logout.php'>退出登录</a>";
        } else {
          echo "<script> alter('login');window.location='login.php';</script>";
        }
        ?>
      </td>
    </tr>
    <tr>
      <td width="80px" align="center" valign="middle">
        <a href="news_add.php" target="mainframe" style="text-decoration:none">添加新闻</a> <br />
        <br />
        <a href="news_list.php" target="mainframe" style="text-decoration:none">新闻管理</a> <br />
        <br />
        <a href="seach.php" target="mainframe" style="text-decoration:none">新闻查找</a> <br />
      </td>
      <td>
        <iframe name="mainframe" style="width:100%; height:500px"></iframe>
      </td>
    </tr>

  </table>
</body>

</html>
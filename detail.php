<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body style="margin:0;">
	<?php
	@header("content-type:text/html;charset=utf8");

	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('数据库连接失败' . mysql_error());
	}
	mysql_query('set names utf8');
	mysql_select_db('news', $link);

	if ($_GET["id"] != "") {
		$nid = $_GET["id"];
		$str = "select * from news where id=" . $nid;
		$arr = mysql_query($str);
		$result = mysql_fetch_array($arr);
	}
	mysql_close($link);
	?>

	<table border="1" width="85%">
		<tr>
			<td colspan="2" align="center">
				新闻詳情
			</td>
		</tr>
		<tr>
			<td >
				新闻名称：
			</td>
			<td><span><?php echo $result['n_name'] ?></span></td>
		</tr>
		<tr>
			<td >
				更新时间：
			</td>
			<td ><span><?php echo $result['n_createtime']; ?></span></td>
		</tr>
		<tr>
			<td >新闻内容：</td>
			<td>
				<textarea rows="20" cols="130">
					<?php echo $result['n_intro'] ?><
				</textarea>
			</td>
		</tr>
	</table>
</body>

</html>
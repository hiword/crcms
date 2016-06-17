<?php
header("Content-type: text/html; charset=utf-8");
ini_set("display_errors", "Off");
error_reporting(E_ERROR);
include 'config.php';
//在指定目录写入PHP注入  以自己的用户名为基准
$connection = mysqli_connect('127.0.0.1','root','zxsoft2012','topic');
$id = $_GET['id'];
//写入用户名文件
if (stripos($id, 'union') !== false)
{
	exit('不允许包含union关键字！');
}
if (strpos($id, "'") !== false || strpos($id, '"') !== false)
{
	exit('不允许包含单双引号！');
}
if (strpos($id, '--') !== false)
{
	exit('不允许包含--');
}

if (strpos($id, ' ') !== false)
{
	exit('不允许包含空格');
}

if(stripos($id, 'outfile') !== false)
{
	exit('不允许包含outfile关键字！');
}

$query = "SELECT * FROM temp WHERE id={$id} LIMIT 1";
// echo $query,'<br />';
$result = mysqli_query($connection, $query);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>SQL测试</title>
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>SQL注入测试</h2>
		<div class="alert alert-success">
			<p>1、不允许包含“--”，空格，单引号，双引号，“union”关键字</p>
			<p>2、需要查询的文件路径为：<?php echo $CONFIG['file_path']?></p>
		</div>
		<p>当前结果：</p>
		<table class="table table-striped">
			<?php 
			if ($result)
			{
				while ((boolean) $row = mysqli_fetch_assoc($result))
				{
					foreach ($row as $key=>$value)
					{
						echo '<tr>';
						echo '<td>',$key,'</td><td>',$value,'</td>';
						echo '</tr>';
					}
				}
			}
			else
			{
				echo '<tr><td>',mysqli_error($connection),'</td></tr>';
			}
			?>
		</table>
	</div>
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入-->
	<script src="./jquery_1.11.3_jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_close($connection);?>
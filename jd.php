<?php
if(!is_null($_GET['myid'])){
$myid=$_GET['myid'];
$url='https://p.3.cn/prices/mgets?&skuIds=J_'.$myid;
$file_url=file_get_contents($url);
$res=json_decode($file_url,true);
echo "当前售价:".$res[0]['p'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>价格查询</title>
</head>
<body>
	<form action="" method="get">
	  <input type="text" name="myid" ></input>
	  <input type="submit" ></input>
	</form>
</body>
</html>
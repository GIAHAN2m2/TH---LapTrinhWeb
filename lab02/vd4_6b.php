<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 2_5</title>
</head>

<body>
<?php
	require("lab2_5a.php");
    require("lab2_5b.php");
    require("lab2_5b.php");
	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
	echo"x=30, require va include ban chat nap file giong nhau tuy nhien, neu require khong co file php thi no se lap tuc dung chuong trinh
    con include chi la canh bao nhung chuong trinh van tiep tuc chay"
?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lab 2_5</title>
</head>

<body>
<?php
	include("lab2_5a.php");
    include("lab2_5b.php");
    include_once("lab2_5b.php");
	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
	echo"Gia tri cua x =20, vi include_once se chi chen file do mot lan duy nhat neu file do da duoc include truoc do roi, no se bo qua lan include sau de tranh loi trung lap bien, ham hoac class."
?>
</body>
</html>
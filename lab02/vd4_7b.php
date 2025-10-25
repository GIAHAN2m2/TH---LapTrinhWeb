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
    require_once("lab2_5b.php");
	if(isset($x))
		echo "Giá trị của x là: $x";
	else
		echo "Biến x không tồn tại";
	echo"vi require 5a da gan gia tri x=10 nen require them 5b se x=x+10, so sanh voi vd4_6 cp x=30 va vd4_7 co x=20 vi o file nay require_once, no se nap x=10 mot lan thoi de tranh trung lap file "
?>
</body>
</html>
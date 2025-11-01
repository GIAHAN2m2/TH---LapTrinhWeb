<?php
//Sử dụng while hay do …while để tìm n nhỏ nhất sao cho 1 + 2 + …+ n >1000
$tong=0;
$n=0;
do{
    $tong+=$n;
    $n++;
}while($tong<1000);
echo "n =" .($n-1);
echo "Tong = $tong <br/>";
?>
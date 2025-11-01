<?php
function kiemtranguyento($x)
{
    $i = 2;
    if ($x < 2)
        return false;
    if ($x == 2)
        return true;
    if ($x % 2 == 0)
        return false;
    do {
        if ($x % $i == 0)
            return false;
        $i += 2;
    } while ($i <= sqrt($x));
    return true;
}
//Xuất n số nguyên tố đầu tiên.
function xuatSoNguyenToDauTien($n, $sl){
    if($n < $sl) {
        echo "So luong khong duoc lon hon";
        return;
    }
    echo "$sl so nguyen to tu 1 den $n la: ";
    $dem = 0;
    $i=2;
    while ($dem<$n)
    {   
            if(kiemtranguyento($i)) {
                if($dem< $sl)
                    echo $i . " ";
                $dem++;
            }
            $i++;
    
    }
}
xuatSoNguyenToDauTien(20,5);
?>


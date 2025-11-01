<?php
//Trong ví dụ lab3_4.php sử dụng vòng lặp for. Hãy sử dụng do…while để thay cho for.
//Kết hợp hàm và vòng lặp

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
if (kiemtranguyento(14))
    echo  "là số nguyên tố";
else
    echo "không phải số nguyên tố";

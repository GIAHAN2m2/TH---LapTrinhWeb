<?php
$a = $_POST['soa'];
$b = $_POST['sob'];
$c = $_POST['soc'];

if ($a == 0) {
    if ($b == 0) {
        if ($c == 0) {
            echo "Phuong trinh vo so nghiem.";
        } else {
            echo "Phuong trinh vo nghiem.";
        }
    } else {
        $x = -$c / $b;
        echo "Phuong trinh bac 1: x = $x";
    }
} else {
    $delta = $b * $b - 4 * $a * $c;

    if ($delta < 0) {
        echo "Phuong trinh vo nghiem.";
    } elseif ($delta == 0) {
        $x = -$b / (2 * $a);
        echo "Phuong trinh co nghiem kep: x1 = x2 = $x";
    } else {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        echo "Phuong trinh co 2 nghiem phan biet: x1 = $x1, x2 = $x2";
    }
}
?>

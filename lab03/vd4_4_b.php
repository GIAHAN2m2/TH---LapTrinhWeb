<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lab 3_5</title>
    <style>
        #banco {
            border: solid;
            padding: 15px;
            background: #E8E8E8
        }

        #banco .cellBlack {
            width: 50px;
            height: 50px;
            background: black;
            float: left;
        }

        #banco .cellWhite {
            width: 50px;
            height: 50px;
            background: white;
            float: left
        }

        .clear {
            clear: both
        }
    </style>
</head>

<body>
    <?php

    ////Thay đổi ví dụ lab3_5.php:
    //a. Hàm bảng cửu chương (BCC): sẽ nhận các tham số $n, $colorHead,
    //$color1, $color2: $colorHead: màu nền của dòng đầu tiên, $color1: màu nền dòng lẻ, $color2: màu nền các dòng chẵn. Các màu này đều có giá trị mặc định
    function BCC($n=6, $colorHead = "pink", $color1 = "white", $color2 = "red", $color3 = "black")
    {
    ?>
        <table bgcolor="red">
            <tr bgcolor="<?php echo $colorHead; ?>">
                <td colspan="3" Bang cuu chuong <?php echo $n; ?>> </td>
            </tr>
            <?php
            for ($i = 3; $i <= 10; $i++) {
            ?>
                <tr bgcolor="<?php if ($i % 2 == 0) echo $color2;
                                else echo $color1; ?> ">
                    <td><?php echo $n; ?></td>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $n * $i; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }
    /*
Hàm in ra bàn cờ vua với màu các ô thay đổi và được định nghĩa trong css: cellBlack, cellWhite
- Input: $size: kích thước bàn cờ: là 1 số nguyên dương (mặc định là 8)
- Output: bàn cờ HTML 

*/
    function BanCo($size = 8)
    {
    ?>
        <div id="banco">
            <?php
            for ($i = 1; $i <= $size; $i++) {
                for ($j = 1; $j <= $size; $j++) {
                    $classCss = (($i + $j) % 2) == 0 ? "cellWhite" : "cellBlack";
                    echo "<div class='$classCss'> $i - $j</div>";
                }
                echo "<div class='clear' />";
            }
            ?>
        </div>
    <?php

    }
    // Bcc(6,"red");	

    // Banco();
    function aggregateFunctions()
    {
        // Tạo chuỗi chứa tên các hàm
        $functions = [
            'BCC',
            'BanCo',
        ];
        // Khởi tạo chuỗi kết quả
        $result = "";
        // Lặp qua các hàm và gọi chúng
        foreach ($functions as $function) {
            if (function_exists($function)) {
                $result .= $function() . " "; // Gọi hàm và thêm vào chuỗi
            }
        }
        return trim($result);
    }
    aggregateFunctions();
    ?>
</body>

</html>
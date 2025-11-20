<?php
$loi = ""; 
$ketqua = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Lấy dữ liệu
    $ten = htmlspecialchars($_POST['ten']);
    $mk = $_POST['psswd'];
    $re = $_POST['repsswd'];
    $gt = isset($_POST['gt']) ? $_POST['gt'] : "";
    $st = htmlspecialchars($_POST['st']);
    $tinh = isset($_POST['tinh']) ? $_POST['tinh'] : "";

    // Kiểm tra mật khẩu
    if ($mk != $re) {
        $loi = "Mật khẩu và nhập lại mật khẩu không khớp.";
    } 
    else {
        // Xử lý ảnh (nếu có)
        $anhHien = "";
        if (isset($_FILES['anh']) && $_FILES['anh']['error'] == 0) {
            $tenAnh = $_FILES['anh']['name'];
            move_uploaded_file($_FILES['anh']['tmp_name'], "uploads/" . $tenAnh);
            $anhHien = "<img src='uploads/$tenAnh' width='150'>";
        }

        // Kết quả
        $ketqua = "
            <h3>Kết quả:</h3>
            Tên đăng nhập: $ten <br>
            Giới tính: $gt <br>
            Sở thích: $st <br>
            Tỉnh: $tinh <br>
            Ảnh: <br> $anhHien <br>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký thành viên</title>
</head>
<body>

<h2>Đăng ký thành viên</h2>

<form action="" method="post" enctype="multipart/form-data">
    Tên đăng nhập (*):
    <input type="text" name="ten" required><br><br>

    Mật khẩu (*):
    <input type="password" name="psswd" required><br><br>

    Nhập lại mật khẩu (*):
    <input type="password" name="repsswd" required><br><br>

    Giới tính (*): <br>
    <input type="radio" name="gt" value="Nam"> Nam<br>
    <input type="radio" name="gt" value="Nữ"> Nữ<br><br>

    Sở thích: <br>
    <textarea name="st"></textarea><br><br>

    Hình ảnh (tùy chọn):
    <input type="file" name="anh" accept="image/*"><br><br>

    Tỉnh (*):
    <select name="tinh" required>
        <option value="">Chọn tỉnh</option>
        <option value="HN">Hà Nội</option>
        <option value="HCM">Hồ Chí Minh</option>
        <option value="DN">Đà Nẵng</option>
        <option value="KH">Khánh Hòa</option>
    </select><br><br>
    
    <input type="submit" value="Đăng ký">
    <input type="reset" value="Reset">
</form>

<hr>

<!-- HIỂN THỊ LỖI -->
<?php
if ($loi != "") {
    echo "<p style='color:red;'><b>Có lỗi xảy ra:</b><br>$loi</p>";
}
?>

<!-- HIỂN THỊ KẾT QUẢ -->
<?php
echo $ketqua;
?>

</body>
</html>

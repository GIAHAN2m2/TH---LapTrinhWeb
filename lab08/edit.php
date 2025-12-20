<?php
try {
    // Tạo đối tượng PDO kết nối đến database 'bookstore' với user 'root'
    $pdh = new PDO("mysql:host=localhost; dbname=bookstore", "root", "");
    // Thiết lập bộ mã UTF-8 để hiển thị tiếng Việt đúng
    $pdh->query("set names 'utf8'");
} catch (Exception $e) {
    // Nếu kết nối thất bại thì báo lỗi và dừng chương trình
    echo $e->getMessage();
    exit;
}

try {
    // Kiểm tra xem người dùng có bấm nút cập nhật không
    if (isset($_POST["sm_update"])) { 
        // Lấy giá trị từ form
        $cat_name = $_POST['cat_name'];
        $cat_id = $_GET['cat_id']; // Lấy cat_id từ URL (trong trường hợp này URL là "edit.php?cat_id=gk")

        // Câu lệnh SQL cập nhật
        $sql = "UPDATE category SET cat_name = :cat_name WHERE cat_id = :cat_id";
        
        // Chuẩn bị câu lệnh
        $stm = $pdh->prepare($sql);

        // Liên kết tham số với giá trị
        $stm->bindParam(':cat_name', $cat_name);
        $stm->bindParam(':cat_id', $cat_id);

        // Thực thi câu lệnh
        $stm->execute();

        // Kiểm tra số dòng bị ảnh hưởng
        $n = $stm->rowCount(); 
        if ($n > 0) {
            echo "Dữ liệu đã được cập nhật!";
        } else {
            echo "Không có thay đổi!";
        }
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>

<form action="edit.php?cat_id=gk" method="post">
    <table border="1px">
        <tr>
            <td>Ma loai:</td>
            <td>
                <!-- Lấy cat_id từ URL, không cho phép sửa -->
                <input type="text" style="font-weight: bold;" disabled value="<?= $_GET['cat_id'] ?>">
            </td>
        </tr>
        <tr>
            <td>Ten loai moi</td>
            <td>
                <input type="text" name="cat_name" value="Giao khoa" required>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="sm_update" value="Lưu sửa đổi">
                <a href="lab8_3.php">Quay lại</a>
            </td>
        </tr>
    </table>
</form>

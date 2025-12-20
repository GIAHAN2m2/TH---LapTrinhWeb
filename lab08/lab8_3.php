<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Quản lý loại sách</title>
    <style>
        /* Khung chứa nội dung chính */
        #container {
            width: 600px;
            margin: 0 auto;
            /* căn giữa trang */
        }
    </style>
</head>

<body>
    <div id="container">

        <!-- Form nhập dữ liệu loại sách -->
        <form action="lab8_3.php" method="post">
            <table>
                <tr>
                    <td>Mã loại:</td>
                    <td><input type="text" name="cat_id" /></td>
                </tr>
                <tr>
                    <td>Tên loại:</td>
                    <td><input type="text" name="cat_name" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="sm" value="Insert" />
                    </td>
                </tr>
            </table>
        </form>

        <?php
        // ------------------- KẾT NỐI CSDL -------------------
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

        // ------------------- XỬ LÝ THÊM LOẠI SÁCH -------------------
        if (isset($_POST["sm"])) { // kiểm tra nếu người dùng bấm nút Insert
            // Câu lệnh SQL thêm loại sách mới với tham số
            $sql = "insert into category(cat_id, cat_name) values(:cat_id, :cat_name)";
            // Mảng ánh xạ tham số với dữ liệu nhập từ form
            $arr = array(":cat_id" => $_POST["cat_id"], ":cat_name" => $_POST["cat_name"]);
            // Chuẩn bị và thực thi câu lệnh
            $stm = $pdh->prepare($sql);
            $stm->execute($arr);
            $n = $stm->rowCount(); // số dòng bị ảnh hưởng

            // Thông báo kết quả
            if ($n > 0) echo "Đã thêm $n loại ";
            else echo "Lỗi thêm ";
        }
        // ------------------- XỬ LÝ XÓA LOẠI SÁCH -------------------
        if (isset($_GET['delete'])) {
            $cat_id = $_GET['delete'];  // Lấy cat_id từ URL để xóa
            try {
                $deleteBooksSQL = "DELETE FROM book WHERE cat_id = :cat_id";
                $stm = $pdh->prepare($deleteBooksSQL);
                $stm->bindParam(':cat_id', $cat_id);
                $stm->execute();
                // Câu lệnh SQL để xóa dữ liệu
                $sql = "DELETE FROM category WHERE cat_id = :cat_id";
                // Chuẩn bị câu lệnh
                $stmt = $pdh->prepare($sql);
                $stmt->bindParam(':cat_id', $cat_id);
                // Thực thi câu lệnh
                $stmt->execute();
                echo "Dữ liệu đã được xóa!";
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }

        // ------------------- LẤY DANH SÁCH LOẠI SÁCH -------------------
        $stm = $pdh->prepare("select * from category");
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC); // lấy tất cả kết quả dưới dạng mảng kết hợp
        ?>

        <!-- Hiển thị danh sách loại sách -->
        <h3>DANH SÁCH CATEGORY</h3>
        <table border="1" cellpadding="5">
            <tr>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td><?= $row['cat_id'] ?></td>
                    <td><?= $row['cat_name'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['cat_id'] ?>">Sửa</a> |
                        <a href="lab8_3.php?delete=<?= $row['cat_id'] ?>"
                            onclick="return confirm('Xóa không?')">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
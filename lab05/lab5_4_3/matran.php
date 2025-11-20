<?php
session_start();

/**
 * Hàm in mảng theo dạng bảng HTML
 */
function showArray($arr) {
    if (empty($arr)) {
        echo "<p>Chưa có dữ liệu.</p>";
        return;
    }

    echo "<table border='1' cellpadding='8' class='table table-bordered'>";
    echo "<tr><th>Index (Key)</th><th>Value</th><th>Hành động</th></tr>";

    foreach ($arr as $k => $v) {
        $k_e = htmlspecialchars($k);
        $v_e = htmlspecialchars($v);

        echo "<tr>";
        echo "<td>$k_e</td>";
        echo "<td>$v_e</td>";
        echo "<td>
                <a href='?action=delete&key=$k_e' class='btn btn-danger btn-sm'>Xóa</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
}

/* -----------------------------------
   KHỞI TẠO MẢNG SESSION
------------------------------------*/
if (!isset($_SESSION['kv'])) {
    $_SESSION['kv'] = [];
}

/* -----------------------------------
   XỬ LÝ GET ACTION
------------------------------------*/
$action = $_GET['action'] ?? '';

if ($action === 'add') {
    $key = trim($_GET['key'] ?? '');
    $value = trim($_GET['value'] ?? '');

    if ($key !== '') {
        $_SESSION['kv'][$key] = $value;
    }

} elseif ($action === 'delete') {
    $key = $_GET['key'] ?? '';
    if ($key !== '' && isset($_SESSION['kv'][$key])) {
        unset($_SESSION['kv'][$key]);
    }

} elseif ($action === 'clear') {
    $_SESSION['kv'] = [];
}

?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Session + GET Demo</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-4">

<h3>Nhập Key và Value bằng SESSION + GET</h3>

<!-- Form thêm -->
<form method="get" class="form-inline mb-3">
    <input type="hidden" name="action" value="add">

    <div class="form-group mr-2">
        <label class="mr-1">Key:</label>
        <input type="text" name="key" class="form-control" required>
    </div>

    <div class="form-group mr-2">
        <label class="mr-1">Value:</label>
        <input type="text" name="value" class="form-control">
    </div>

    <button class="btn btn-primary">Thêm</button>
</form>

<!-- Hủy -->
<a href="?action=clear" class="btn btn-danger mb-3">Hủy (Xóa hết)</a>

<!-- Hiển thị bảng -->
<?php showArray($_SESSION['kv']); ?>

</body>
</html>

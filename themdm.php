<?php
require_once "db_module.php"; // Kết nối cơ sở dữ liệu

$link = NULL;
taoKetNoi($link); // Thiết lập kết nối

// Kiểm tra thông báo
if (isset($_GET['msg']) && $_GET['msg'] == 'done') {
    echo "<p>Thêm thành công!</p>";
} elseif (isset($_GET['error'])) {
    echo "<p>Có lỗi xảy ra!</p>";
}

// Truy vấn để lấy danh sách danh mục
$query = "SELECT * FROM tbl_danhmuc";
$result = chayTruyVanTraVeDL($link, $query);

// Hiển thị bảng danh mục
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['ten']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Không có danh mục nào.</p>";
}

// Giải phóng bộ nhớ kết nối
giaiPhongBoNho($link, $result);
?>

<form method="POST" action="xulydm.php">
    <label for="ten">Tên Danh Mục:</label>
    <input type="text" name="ten" id="ten" required>
    <input type="submit" value="Thêm">
</form>
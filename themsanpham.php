<?php
require_once "db_module.php"; // Kết nối cơ sở dữ liệu

$link = NULL; // Khởi tạo biến kết nối
taoKetNoi($link); // Thiết lập kết nối

// Truy vấn danh mục từ cơ sở dữ liệu
$query_dm = "SELECT * FROM tbl_danhmuc";
$result_dm = chayTruyVanTraVeDL($link, $query_dm);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>
<body>

<h1>Thêm Sản Phẩm</h1>

<?php
// Kiểm tra và hiển thị thông báo chỉ khi thêm thành công
if (isset($_GET['msg']) && $_GET['msg'] === 'done') {
    echo "<p style='color: green;'>Thêm sản phẩm thành công!</p>";
}
?>

<form method="POST" action="xulysanpham.php">
    <label for="ten_sp">Tên Sản Phẩm:</label>
    <input type="text" name="ten_sp" id="ten_sp" required>

    <label for="mota">Mô Tả:</label>
    <textarea name="mota" id="mota"></textarea>

    <label for="gia">Giá:</label>
    <input type="number" name="gia" id="gia" step="0.01" required>

    <label for="id_dm">Danh Mục:</label>
    <select name="id_dm" id="id_dm" required>
        <?php
        // Hiển thị danh mục
        if ($result_dm && mysqli_num_rows($result_dm) > 0) {
            while ($row = mysqli_fetch_assoc($result_dm)) {
                echo "<option value='{$row['id']}'>{$row['ten']}</option>";
            }
        } else {
            echo "<option value=''>Không có danh mục nào</option>";
        }
        ?>
    </select>

    <input type="submit" value="Thêm Sản Phẩm"> <!-- Nút thêm sản phẩm -->
</form>

</body>
</html>

<?php
// Giải phóng bộ nhớ kết nối
giaiPhongBoNho($link, $result_dm);
?>
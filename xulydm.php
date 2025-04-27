<?php
require_once "db_module.php"; // Kết nối cơ sở dữ liệu

$link = NULL; // Khởi tạo biến kết nối

// Tạo kết nối đến cơ sở dữ liệu
taoKetNoi($link);

if (isset($_POST['ten'])) {
    $ten = $_POST['ten'];

    // Thực hiện truy vấn thêm danh mục
    $query = "INSERT INTO tbl_danhmuc (ten) VALUES ('$ten')";
    $result = chayTruyVanKhongTraVeDL($link, $query);

    // Giải phóng bộ nhớ kết nối
    giaiPhongBoNho($link, $result);

    // Kiểm tra xem truy vấn có thành công không
    if ($result) {
        header("Location: themdm.php?msg=done"); // Chuyển hướng với thông báo thành công
    } else {
        header("Location: themdm.php?error=error"); // Chuyển hướng với thông báo lỗi
    }
} else {
    // Chuyển hướng về trang themdm.php với thông báo lỗi nếu không có dữ liệu
    header("Location: themdm.php?error=error");
}
?>
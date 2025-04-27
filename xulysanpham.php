<?php
require_once "db_module.php"; // Kết nối cơ sở dữ liệu

$link = NULL; // Khởi tạo biến kết nối
taoKetNoi($link); // Thiết lập kết nối

if (isset($_POST['ten_sp']) && isset($_POST['mota']) && isset($_POST['gia']) && isset($_POST['id_dm'])) {
    $ten_sp = $_POST['ten_sp'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $id_dm = $_POST['id_dm'];

    // Thực hiện truy vấn thêm sản phẩm
    $query = "INSERT INTO tbl_sanpham (ten, mota, gia, id_dm) VALUES ('$ten_sp', '$mota', $gia, $id_dm)";
    
    $result = mysqli_query($link, $query);
    
    // Kiểm tra kết quả truy vấn
    if ($result) {
        header("Location: themsanpham.php?msg=done"); // Chuyển hướng với thông báo thành công
    } else {
        echo "Lỗi: " . mysqli_error($link); // In ra lỗi nếu có
        exit();
    }
} else {
    header("Location: themsanpham.php?error=error");
}
if ($result) {
    header("Location: themsanpham.php?msg=done"); // Chuyển hướng với thông báo thành công
} else {
    echo "Lỗi: " . mysqli_error($link); // In ra lỗi nếu có
    exit();
}
?>
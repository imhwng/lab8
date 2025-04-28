<?php
require_once "db_module.php";

$link = null;
taoKetNoi($link);

// Truy vấn để lấy ID của bản tin theo tiêu đề
$tieude = "Sự thay đổi cách thức mua sắm của khách hàng trong thời kì thương mại điện tử";
$sqlTin = "SELECT id_bantin FROM tbl_bantin WHERE tieude = ?";
$stmt = $link->prepare($sqlTin);
$stmt->bind_param("s", $tieude);
$stmt->execute();
$resultTin = $stmt->get_result();

if ($resultTin && $resultTin->num_rows > 0) {
    $rowTin = $resultTin->fetch_assoc();
    $id_bantin = $rowTin["id_bantin"];

    // Truy vấn để lấy bình luận của bản tin
    $sqlBinhLuan = "SELECT * FROM tbl_binhluan WHERE id_bantin = ?";
    $stmtBinhLuan = $link->prepare($sqlBinhLuan);
    $stmtBinhLuan->bind_param("i", $id_bantin);
    $stmtBinhLuan->execute();
    $resultBinhLuan = $stmtBinhLuan->get_result();

    // Hiển thị bình luận
    if ($resultBinhLuan && $resultBinhLuan->num_rows > 0) {
        while ($rowBinhLuan = $resultBinhLuan->fetch_assoc()) {
            echo "Tiêu đề bình luận: " . $rowBinhLuan["tieude"] . "<br>";
            echo "Nội dung: " . $rowBinhLuan["noidung"] . "<br>";
            echo "Thời gian: " . $rowBinhLuan["thoigian"] . "<br><br>";
        }
    } else {
        echo "Không có bình luận nào cho bản tin này.";
    }
} else {
    echo "Không tìm thấy bản tin với tiêu đề đã cho.";
}

// Giải phóng bộ nhớ cho kết quả bình luận
if ($resultBinhLuan) {
    mysqli_free_result($resultBinhLuan);
}

// Giải phóng bộ nhớ cho kết quả bản tin
if ($resultTin) {
    mysqli_free_result($resultTin);
}

// Đóng kết nối
mysqli_close($link);
?>
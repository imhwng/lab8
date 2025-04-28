<?php
require_once "db_module.php";

$link = null;
taoKetNoi($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    
    // Lấy ID bản tin theo tiêu đề
    $tieuDeTin = "Liệu Samsung sẽ thành công với Galaxy S4 hay sẽ rơi vào tình trạng suy giảm sự tin cậy của nhà đầu tư như Apple";
    $sqlTin = "SELECT id_bantin FROM tbl_bantin WHERE tieude = ?";
    $stmt = $link->prepare($sqlTin);
    $stmt->bind_param("s", $tieuDeTin);
    $stmt->execute();
    $resultTin = $stmt->get_result();

    if ($resultTin && $resultTin->num_rows > 0) {
        $rowTin = $resultTin->fetch_assoc();
        $id_bantin = $rowTin['id_bantin'];

        // Thêm bình luận vào bảng
        $sqlBinhLuan = "INSERT INTO tbl_binhluan (id_bantin, tieude, noidung) VALUES (?, ?, ?)";
        $stmtBinhLuan = $link->prepare($sqlBinhLuan);
        $stmtBinhLuan->bind_param("iss", $id_bantin, $tieude, $noidung);

        if ($stmtBinhLuan->execute()) {
            echo "Bình luận đã được thêm thành công!";
        } else {
            echo "Có lỗi xảy ra khi thêm bình luận.";
        }
    } else {
        echo "Không tìm thấy bản tin.";
    }

    // Giải phóng bộ nhớ
    //giaiPhongBoNho($link, $resultTin);
}

// Đóng kết nối
mysqli_close($link);
?>
<?php
require_once "db_module.php";

$link = null;
taoKetNoi($link);

// Truy vấn để lấy lượt like của các bài viết
$sql = "SELECT id_bantin, tieude, `like` FROM tbl_bantin";
$result = chayTruyVanTraVeDL($link, $sql);

// Kiểm tra và hiển thị kết quả
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_bantin"] . " - Tiêu đề: " . $row["tieude"] . " - Lượt like: " . $row["like"] . "<br>";
    }
} else {
    echo "Không tìm thấy bài viết nào.";
}

// Giải phóng bộ nhớ và đóng kết nối
giaiPhongBoNho($link, $result);
?>
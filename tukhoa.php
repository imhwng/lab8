<?php
require_once "db_module.php";

$link = null;
taoKetNoi($link);

// Truy vấn để lấy các bản tin có chứa từ 'công nghệ' trong tiêu đề
$tukhoa = "công nghệ";
$sql = "SELECT * FROM tbl_bantin WHERE tieude LIKE '%$tukhoa%'";
$result = chayTruyVanTraVeDL($link, $sql);

// Kiểm tra và hiển thị kết quả
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_bantin"] . " - ";
        echo "<a href='chitiet.php?id=" . $row["id_bantin"] . "'>" . $row["tieude"] . "</a><br>";
    }
} else {
    echo "Không tìm thấy bản tin nào.";
}

// Giải phóng bộ nhớ và đóng kết nối
giaiPhongBoNho($link, $result);
?>
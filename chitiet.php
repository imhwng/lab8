<?php
require_once "db_module.php";

$link = null;
taoKetNoi($link);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM tbl_bantin WHERE id_bantin = $id";
    $result = chayTruyVanTraVeDL($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<h1>" . $row["tieude"] . "</h1>";
        echo "<p><strong>Nội dung:</strong> " . $row["noidung"] . "</p>";
        echo "<p><strong>Nguồn tin:</strong> " . $row["nguontin"] . "</p>";
        // Hiển thị thêm các thông tin khác nếu cần
    } else {
        echo "Không tìm thấy bản tin.";
    }
} else {
    echo "ID không hợp lệ.";
}

// Giải phóng bộ nhớ và đóng kết nối
giaiPhongBoNho($link, $result);
?>
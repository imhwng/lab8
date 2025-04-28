<?php
require_once("db_module.php");
$link = NULL;
taoKetNoi($link);

// Lấy id_bantin của bài Apple
$sql = "SELECT id_bantin FROM tbl_bantin WHERE tieude LIKE '%Thoái trào tất yếu của Apple%'";
$result = chayTruyVanTraVeDL($link, $sql);
$row = mysqli_fetch_assoc($result);
$id_bantin = $row['id_bantin'];
mysqli_free_result($result);

// Lấy độc giả có bình luận chứa từ khóa "ngốc nghếch"
$sql = "SELECT DISTINCT tbl_docgia.hoten, tbl_docgia.email 
        FROM tbl_binhluan 
        INNER JOIN tbl_docgia ON tbl_binhluan.id_docgia = tbl_docgia.id_docgia
        WHERE tbl_binhluan.id_bantin = $id_bantin
        AND tbl_binhluan.noidung LIKE '%ngốc nghếch%'";
$result = chayTruyVanTraVeDL($link, $sql);

echo "<h2>Độc giả bình luận 'ngốc nghếch'</h2>";
echo "<ul>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . $row['hoten'] . " (" . $row['email'] . ")</li>";
}
echo "</ul>";

giaiPhongBoNho($link, $result);
?>

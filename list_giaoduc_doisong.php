<?php
require_once("db_module.php");
$link = NULL;
taoKetNoi($link);

$sql = "SELECT * FROM tbl_bantin 
        INNER JOIN tbl_danhmuc ON tbl_bantin.id_danhmuc = tbl_danhmuc.id_danhmuc 
        WHERE ten_danhmuc IN ('Giáo dục', 'Đời sống')";
$result = chayTruyVanTraVeDL($link, $sql);

echo "<h2>Bản tin Giáo dục và Đời sống</h2>";
echo "<ul>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . $row['tieude'] . " (Danh mục: " . $row['ten_danhmuc'] . ")</li>";
}
echo "</ul>";

giaiPhongBoNho($link, $result);
?>

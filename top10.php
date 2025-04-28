<?php
require_once("db_module.php");
$link = NULL;
taoKetNoi($link);

$sql = "SELECT * FROM tbl_bantin ORDER BY `like` DESC LIMIT 10";
$result = chayTruyVanTraVeDL($link, $sql);

echo "<h2>Top 10 bản tin nhiều like nhất</h2>";
echo "<ul>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . $row['tieude'] . " - " . $row['like'] . " likes</li>";
}
echo "</ul>";

giaiPhongBoNho($link, $result);
?>

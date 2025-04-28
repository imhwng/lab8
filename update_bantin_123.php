<?php
require_once("db_module.php");
$link = NULL;
taoKetNoi($link);

if (isset($_POST['submit'])) {
    $noidung = $_POST['noidung'];

    $sql_update = "UPDATE tbl_bantin SET noidung = '$noidung' WHERE id_bantin = 123";
    if (chayTruyVanKhongTraVeDL($link, $sql_update)) {
        echo "Cập nhật nội dung thành công!";
    } else {
        echo "Cập nhật thất bại!";
    }
}
giaiPhongBoNho($link, $result ?? null);
?>

<form method="post">
    Nội dung mới: <textarea name="noidung"></textarea><br>
    <input type="submit" name="submit" value="Cập nhật">
</form>

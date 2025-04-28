<?php
require_once("db_module.php");
$link = NULL;
taoKetNoi($link);

if (isset($_POST['submit'])) {
    $tieude = $_POST['tieude'];
    $hinhanh = $_POST['hinhanh'];
    $noidung = $_POST['noidung'];
    $tukhoa = $_POST['tukhoa'];
    $nguontin = $_POST['nguontin'];
    $like = $_POST['like'];
    $rating = $_POST['rating'];

    // Lấy id_danhmuc Công nghệ
    $sql_dm = "SELECT id_danhmuc FROM tbl_danhmuc WHERE ten_danhmuc = 'Công nghệ'";
    $result_dm = chayTruyVanTraVeDL($link, $sql_dm);
    $row_dm = mysqli_fetch_assoc($result_dm);
    $id_danhmuc = $row_dm['id_danhmuc'];
    mysqli_free_result($result_dm);

    $sql_insert = "INSERT INTO tbl_bantin (id_danhmuc, tieude, hinhanh, noidung, tukhoa, nguontin, `like`, rating)
                   VALUES ('$id_danhmuc', '$tieude', '$hinhanh', '$noidung', '$tukhoa', '$nguontin', '$like', '$rating')";
    if (chayTruyVanKhongTraVeDL($link, $sql_insert)) {
        echo "Thêm bản tin thành công!";
    } else {
        echo "Thêm bản tin thất bại!";
    }
}
giaiPhongBoNho($link, $result ?? null);
?>

<form method="post">
    Tiêu đề: <input type="text" name="tieude"><br>
    Hình ảnh: <input type="text" name="hinhanh"><br>
    Nội dung: <textarea name="noidung"></textarea><br>
    Từ khóa: <input type="text" name="tukhoa"><br>
    Nguồn tin: <input type="text" name="nguontin"><br>
    Like: <input type="number" name="like"><br>
    Rating: <input type="number" step="0.1" name="rating"><br>
    <input type="submit" name="submit" value="Thêm bản tin">
</form>

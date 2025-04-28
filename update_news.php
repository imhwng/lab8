<?php
require_once 'db_module.php';
taoKetNoi($link);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_content = mysqli_real_escape_string($link, $_POST['content']);
    $update_query = "UPDATE news SET content = '$new_content' WHERE id = 123";
    if (chayTruyVanKhongTraVeDL($link, $update_query)) {
        echo "Cập nhật nội dung thành công!";
    } else {
        echo "Lỗi khi cập nhật nội dung.";
    }
    giaiPhongBoNho($link);
    exit;
}

// Lấy nội dung hiện tại
$select_query = "SELECT content FROM news WHERE id = 123";
$result = chayTruyVanTraVeDL($link, $select_query);
$row = mysqli_fetch_assoc($result);
$current_content = $row['content'];
giaiPhongBoNho($link, $result);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Nội Dung</title>
</head>
<body>
    <h2>Cập Nhật Nội Dung Cho Bài Viết ID 123</h2>
    <form method="post">
        <label>Nội dung mới:<br><textarea name="content" rows="5" cols="50" required><?= htmlspecialchars($current_content) ?></textarea></label><br>
        <input type="submit" value="Cập Nhật">
    </form>
</body>
</html>

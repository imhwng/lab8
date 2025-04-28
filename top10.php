<?php
require_once 'db_module.php';
taoKetNoi($link);

$query = "SELECT title, likes FROM news ORDER BY likes DESC LIMIT 10";
$result = chayTruyVanTraVeDL($link, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Top 10 Bản Tin</title>
</head>
<body>
    <h2>Top 10 Bản Tin Nhiều Lượt Thích</h2>
    <table border="1">
        <tr>
            <th>Tiêu đề</th>
            <th>Lượt thích</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= $row['likes'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php giaiPhongBoNho($link, $result); ?>
</body>
</html>

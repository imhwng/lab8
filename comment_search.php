<?php
require_once 'db_module.php';
taoKetNoi($link);

$query = "SELECT DISTINCT u.name AS user_name FROM comments c
          JOIN users u ON c.user_id = u.id
          JOIN news n ON c.news_id = n.id
          WHERE n.title = 'Thoái trào tất yếu của Apple...'
          AND c.content LIKE '%ngốc nghếch%'";
$result = chayTruyVanTraVeDL($link, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Độc Giả Bình Luận</title>
</head>
<body>
    <h2>Độc Giả Bình Luận Chứa "ngốc nghếch"</h2>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <li><?= htmlspecialchars($row['user_name']) ?></li>
        <?php endwhile; ?>
    </ul>
    <?php giaiPhongBoNho($link, $result); ?>
</body>
</html>

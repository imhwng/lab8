<?php
function taoKetNoi(&$link) {
    $link = mysqli_connect(HOST, USER, PASSWORD, DB);
    mysqli_set_charset($link, "utf8");
}

function chayTruyVanTraVeDL($link, $query) {
    return mysqli_query($link, $query);
}

function giaiPhongBoNho($link, $result) {
    mysqli_free_result($result);
    mysqli_close($link);
}
?>

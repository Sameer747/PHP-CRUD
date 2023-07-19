<?php
$totalPagesQuery = "SELECT COUNT(id) FROM `test`";
$totalResult = mysqli_query($conn, $totalPagesQuery);
$count = mysqli_fetch_row($totalResult);
$totalpages = ceil($count[0] / $recordsPerPage); //48=10
?>
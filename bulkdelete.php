<?php
include "db_conn.php";

$id = $_POST['delete'];
$seperated = implode(' , ', $id);
$sql = "DELETE FROM `test` WHERE id IN ($seperated)";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("Location: index.php?msg=Data deleted successfully");
} else {
    echo "Failed: " . mysqli_error($conn);
}


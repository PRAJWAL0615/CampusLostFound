<?php
include "../config/db.php";

$id=$_GET['id'];

$conn->query("DELETE FROM items WHERE item_id=$id");

header("Location: dashboard.php");
exit();
?>
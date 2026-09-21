<?php
include "../config/db.php";

$id=$_GET['id'];

$conn->query("UPDATE items SET status='Recovered' WHERE item_id=$id");

header("Location: dashboard.php");
exit();
?>
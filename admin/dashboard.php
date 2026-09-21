<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include "../config/db.php";

$result=$conn->query("SELECT * FROM items ORDER BY item_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">

<h1>Admin Dashboard</h1>

<a href="../index.php" class="btn">Home</a>

<?php
while($row=$result->fetch_assoc()){
?>

<div class="card">

<h3><?= $row['item_name']; ?></h3>

<p><?= $row['item_type']; ?></p>

<p>Status: <?= $row['status']; ?></p>

<a href="recover.php?id=<?= $row['item_id']; ?>" class="btn">Recover</a>

<a href="delete.php?id=<?= $row['item_id']; ?>" class="btn">Delete</a>

</div>

<?php } ?>

</div>

</body>
</html>
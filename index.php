<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Lost & Found</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>🎒 Campus Lost & Found Portal</h1>
    <p>Report and find lost items on campus.</p>

    <div class="buttons">
        <a href="report.php" class="btn">Report Item</a>
        <a href="search.php" class="btn">Search Items</a>
        <a href="admin/login.php" class="btn">Admin Login</a>
    </div>

    <h2>Recent Reports</h2>

    <div class="cards">

    <?php
    $result = $conn->query("SELECT * FROM items ORDER BY item_id DESC");

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
    ?>

        <div class="card">
            <h3><?= $row['item_name']; ?></h3>
            <p><strong>Type:</strong> <?= $row['item_type']; ?></p>
            <p><strong>Category:</strong> <?= $row['category']; ?></p>
            <p><strong>Location:</strong> <?= $row['location']; ?></p>
            <p><strong>Status:</strong> <?= $row['status']; ?></p>
        </div>

    <?php
        }
    }else{
        echo "<p>No reports yet.</p>";
    }
    ?>

    </div>

</div>

</body>
</html>
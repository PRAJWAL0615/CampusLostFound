<?php
include 'config/db.php';

$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM items WHERE item_name LIKE '%$search%' OR category LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Items</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h1>Search Lost & Found Items</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Search by item or category" value="<?php echo $search; ?>">
    <button type="submit">Search</button>
</form>

<h2>Results</h2>

<?php
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
    echo "<p>No matching items found.</p>";
}
?>

<a href="index.php" class="btn">Back to Home</a>

</div>

</body>
</html>
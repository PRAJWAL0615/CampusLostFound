<?php
include 'config/db.php';

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $item=$_POST['item'];
    $category=$_POST['category'];
    $type=$_POST['type'];
    $description=$_POST['description'];
    $location=$_POST['location'];
    $date=$_POST['date'];

    $conn->query("INSERT INTO users(name,email,phone)
    VALUES('$name','$email','$phone')");

    $user_id=$conn->insert_id;

    $conn->query("INSERT INTO items(user_id,item_name,category,item_type,description,location,report_date)
    VALUES('$user_id','$item','$category','$type','$description','$location','$date')");

    echo "<script>alert('Report Submitted Successfully');window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h1>Report Lost or Found Item</h1>

<form method="POST">

<label>Name</label>
<input type="text" name="name" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Phone</label>
<input type="text" name="phone" required>

<label>Item Name</label>
<input type="text" name="item" required>

<label>Category</label>
<select name="category">
    <option>Bag</option>
    <option>Electronics</option>
    <option>ID Card</option>
    <option>Books</option>
    <option>Other</option>
</select>

<label>Lost or Found?</label>
<select name="type">
    <option>Lost</option>
    <option>Found</option>
</select>

<label>Description</label>
<textarea name="description"></textarea>

<label>Location</label>
<input type="text" name="location">

<label>Date</label>
<input type="date" name="date">

<button name="submit">Submit Report</button>

</form>

</div>

</body>
</html>
<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $phone_number = $_POST['phone_number'];
    $create_time = date(format: 'Y-m-d H:i:s');

    $sql = "INSERT INTO employees (name, position, salary, phone_number, create_time) VALUES ('$name', '$position', $salary, '$phone_number', '$create_time')";
    if ($conn->query(query: $sql) === TRUE) {
        header(header: "Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Karyawan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Create Karyawan</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>position</label>
                <input type="text" name="position" class="form-control" required>
            </div>
            <div class="form-group">
                <label>salary</label>
                <input type="number" name="salary" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
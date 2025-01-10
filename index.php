<?php
include 'connection.php';

class Database {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function read($table): mysqli_result {
        $sql = "SELECT * FROM $table";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id = $id";
        return $this->conn->query($sql);
    }
}

$db = new Database($conn);
$employees = $db->read('employees');

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $db->delete('employees', $id);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Karyawan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Data Karyawan</h2>
        <a href="create.php" class="btn btn-primary mb-3">Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>No Telpon</th>
                    <th>Tanggal Dibuat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($employees->num_rows > 0): ?>
                    <?php while($row = $employees->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['position']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['create_time']; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Update</a>
                                <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No data found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
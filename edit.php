<?php
include 'db.php';

$id = $_GET['id'];

// Get existing user info
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $activity = $_POST['activity'];
    $status = $_POST['status'];
    $category = $_POST['category'];

    $sql = "UPDATE users SET name='$name', activity='$activity', status='$status', category='$category' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/style.css">

</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="heads">
                <img src="img/buksulogo.png" alt="Logo">
            </div>
            <ul class="menu">
                <li>
                    <a href="index.php" class="active">
                        <img src="img/dashboardwhite.png" alt="dashboard">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="adduser.php">
                        <img src="img/costumerorder.png" alt="products">
                        <span>Add User</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="topbar">
                <div class="search">
                    <input type="text" placeholder="Search. . .">
                </div>

                <div class="user-profile">
                    <span>Welcome, User</span>
                    <a href="../dashboard/settings.html">
                        <img src="img/usericonwhite.png" alt="user" class="click-user"></a>
                </div>
            </div>
</head>
<body>

            <h2>Edit User</h2>
            <form method="post">
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
                <label>Activity:</label>
            <select name="activity" required>
                <option value="Sing Gig">Sing Gig</option>
                <option value="Case Study Defense">Case Study Defense</option>
                <option value="Photoshoot">Photoshoot</option>
                <option value="Group Study">Group Study</option>
            </select><br>

            <label>Status:</label>
            <select name="status" required>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
            </select><br>

            <label>Category:</label>
            <select name="category" required>
                <option value="Personal">Personal</option>
                <option value="Academic">Academic</option>
                <option value="Work">Work</option>
            </select><br>
                <input type="submit" value="Update" class="btn">
            </form>

</body>
</html>

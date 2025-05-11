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
                    <a>
                        <img src="img/usericonwhite.png" alt="user" class="click-user"></a>
                </div>
            </div>
</head>
<body>
<h2 style="margin-bottom: 15px;">User List</h2>
   
    <table>
        <thead>
            <tr>
                <th>User ID</th><th>User Name</th><th>Activities</th><th>Time Stamp</th><th>Status</th><th>Category</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['activity']."</td>
                            <td>".$row['timestamp']."</td>
                            <td>".$row['status']."</td>
                            <td>".$row['category']."</td>
                             <td>
                                <a href='edit.php?id=".$row['id']."' class='btn'>Edit</a>
                                 <a href='delete.php?id=".$row['id']."' class='btn-delete' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                            </td>
                          </tr>";
                }
                
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
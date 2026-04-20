<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "<script>alert('Please login first'); window.location.href='login.php';</script>";
    exit;
}
$con = mysqli_connect("localhost", "root", "", "to-do");
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body{
            background-color: lightgray;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn:hover {
            background-color: #0056b3;
            color: white;
        }
        .table thead th {
            background-color: #f8f9fa;
        }
         .navbar-brand img {
            border-radius: 50%;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.jpg" width="50" height="50" alt="">
            </a>
            <span class="navbar-brand mb-0 h1">To-Do Task App</span>
            <div class="ms-auto">
                <a href="logout.php" class="btn btn-outline-light me-2" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
            </div>
        </div>
    </nav>

    <div class="row align-items-center justify-content-center">
        <div class="col-sm-10">
            <div class="card mt-5 mb-5">
                <div class="card-header text-center bg-info d-flex justify-content-between align-items-center">
                    <h4 style="color: Dark-blue;" class="mb-0">Tasks List</h4>
                    <a href="add_task.php" class="btn btn-primary btn-sm">Add Task</a>
                </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt = $con->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY id DESC");
                                $stmt->bind_param("i", $user_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["title"] . "</td>";
                                        echo "<td>" . $row["description"] . "</td>";
                                        echo "<td>" . $row["priority"] . "</td>";
                                        echo "<td>" . $row["due_date"] . "</td>";
                                        $status = $row["status"] ?? 'pending';
                                        echo "<td style='background-color: " . ($status == 'completed' ? 'lightgreen' : 'lightcoral') . "'>" . $status . "</td>" ;
                                        echo "<td><a class='btn btn-success' href='complete_task.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to complete this task?\")'>Complete</a>
                                            <a class='btn btn-danger' href='delete_task.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this task?\")'>Delete</a>
                                            <a class='btn btn-warning' href='update.php?id=" . $row["id"] . "'>Update</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                else {
                                    echo "<tr><td colspan='4'>No tasks found</td></tr>";
                                }
                                $stmt->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-dark text-center text-white p-3 mt-5">
            <p>&copy; 2026 To-Do Task App. All rights reserved.</p>
        </footer>
</body>
</html>
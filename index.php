<?php
// include 'User.php';

// $user = new User();

// // Fetch all users
// $users = $user->read();

// // Ensure $users is an array, and if not, initialize it to an empty array
// if (!is_array($users)) {
//     $users = [];
// }// Includes the User.php file, fetches the list of all users via the read() method, and ensures the result is an array.


$success = 0;
$user = 0;
$invalid = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'db2.php';

    // Get the entered username and password from the form
    $username = $_POST['UserName'];
    $password = $_POST['Password'];
    
    //Define the admin credentials (you can later store these securely in the database)
    $adminUsername = 'admin';  // Replace 'admin' with the actual admin username
    $adminPassword = 'admin123';  // Replace 'admin123' with the actual admin password

    // const ADMINUSERNAME= "admin";
    // const ADMINPASSWORD="admin123";

    // if($username == ADMINUSERNAME && $password == ADMINPASSWORD) {
    //     // If username and password match admin, redirect to admin User_list or desired page
    //     header('Location: User_list.php');
    //     exit(); // Prevent further execution after redirect
    // } else {
    //     $invalid = 1; // Set invalid flag if credentials don't match
    // }



    // Check if the user is trying to log in as admin
    if($username == $adminUsername && $password == $adminPassword) {
        // If username and password match admin, redirect to admin User_list or desired page
        header('Location: User_list.php');
        exit(); // Prevent further execution after redirect
    } else {
        $invalid = 1; // Set invalid flag if credentials don't match
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Login</title>
</head>
<body>

<?php
if($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid admin credentials.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
?>

<div class="container">
    <div class="form-container">
        <h1 class="text-center">Admin Login</h1>
        <form action="index.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <label for="UserName">Admin Username</label>
                <input type="text" class="form-control" placeholder="Enter admin username" id="UserName" name="UserName" required>
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="Password" name="Password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<?php
include 'User.php';

$user = new User();

// Fetch all users
$users = $user->read();

// Ensure $users is an array, and if not, initialize it to an empty array
if (!is_array($users)) {
    $users = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>User List</h2>
        
        <!-- Add the 'Create User' link/button -->
        <a href="create.php" class="btn">Create User</a>
        <a href="index.php" class="btn">Logout</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Profile Picture</th>
                    <th class="actions-column">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['ID']); ?></td>
                        <td><?php echo htmlspecialchars($user['FirstName']); ?></td>
                        <td><?php echo htmlspecialchars($user['LastName']); ?></td>
                        <td><?php echo htmlspecialchars($user['MobileNumber']); ?></td>
                        <td><?php echo htmlspecialchars($user['Email']); ?></td>
                        <td><?php echo htmlspecialchars($user['Address']); ?></td>
                        <td>
                            <?php if (!empty($user['ProfilePic'])): ?>
                                <img src="uploads/<?php echo htmlspecialchars($user['ProfilePic']); ?>" alt="Profile Picture" width="50">
                                <br>
                                <small>Path: uploads/<?php echo htmlspecialchars($user['ProfilePic']); ?></small>
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td class="actions-column">
                            <a href="edit.php?id=<?php echo $user['ID']; ?>" class="action-link">Edit</a> |
                            <a href="delete.php?delete=<?php echo $user['ID']; ?>" class="action-link" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

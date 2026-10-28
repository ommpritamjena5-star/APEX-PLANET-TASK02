<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - ApexPlanet Task 2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>

    <p style="font-size: 16px; margin-top: 15px; margin-bottom: 25px; color: #475569;">
        A modern <strong>PHP & MySQL</strong> web application with secure authentication and complete <em>CRUD</em> functionality for managing student records and posts.
    </p>

    <?php if (isset($_SESSION['user_id'])): ?>

        <div class="alert alert-info">
            👋 Welcome back, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!
        </div>

        <div style="display: flex; gap: 12px; margin-top: 20px;">
            <a href="posts/index.php" class="btn btn-primary">Manage Posts →</a>
            <a href="auth/logout.php" class="btn btn-secondary">Logout</a>
        </div>

    <?php else: ?>

        <div style="display: flex; gap: 12px; margin-top: 20px;">
            <a href="auth/login.php" class="btn btn-primary">Sign In</a>
            <a href="auth/register.php" class="btn btn-secondary">Create Account</a>
        </div>

    <?php endif; ?>

</div>

</body>
</html>
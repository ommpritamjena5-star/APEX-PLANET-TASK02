<?php

session_start();

require_once "../config/database.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../auth/login.php");
    exit();
}

$result = $conn->query(
    "SELECT id, title, content, created_at 
     FROM posts 
     ORDER BY created_at DESC"
);

function formatPostContent($text) {
    $escaped = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    
    // BBCode style [b], [i], [u]
    $escaped = preg_replace('/\[b\](.*?)\[\/b\]/is', '<strong>$1</strong>', $escaped);
    $escaped = preg_replace('/\[i\](.*?)\[\/i\]/is', '<em>$1</em>', $escaped);
    $escaped = preg_replace('/\[u\](.*?)\[\/u\]/is', '<u>$1</u>', $escaped);
    
    // Markdown style **bold**, *italic*, __underline__
    $escaped = preg_replace('/\*\*(.*?)\*\*/s', '<strong>$1</strong>', $escaped);
    $escaped = preg_replace('/(?<!\*)\*(?!\*)(.*?)(?<!\*)\*(?!\*)/s', '<em>$1</em>', $escaped);
    $escaped = preg_replace('/__(.*?)__/s', '<u>$1</u>', $escaped);
    
    return nl2br($escaped);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts - ApexPlanet Task 2</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<div class="container">

    <div class="header-bar">
        <div>
            <h1>Student Management System</h1>
            <p class="header-user">
                Welcome, <strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong>!
            </p>
        </div>
        <div class="nav-actions">
            <a href="create.php" class="btn btn-primary">+ Create Post</a>
            <a href="../auth/logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>

    <h2>My Posts</h2>

    <?php if ($result && $result->num_rows > 0): ?>

        <?php while ($post = $result->fetch_assoc()): ?>

            <article>
                <div class="article-header">
                    <h3 class="article-title">
                        <?php echo htmlspecialchars($post["title"]); ?>
                    </h3>
                </div>

                <div class="article-body">
                    <?php echo formatPostContent($post["content"]); ?>
                </div>

                <div class="article-footer">
                    <small class="meta">
                        🕒 <em>Created: <?php echo date("M d, Y - h:i A", strtotime($post["created_at"])); ?></em>
                    </small>

                    <div class="article-actions">
                        <a href="edit.php?id=<?php echo $post["id"]; ?>" class="btn btn-secondary btn-sm">
                            Edit
                        </a>
                        <a href="delete.php?id=<?php echo $post["id"]; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this post?');">
                            Delete
                        </a>
                    </div>
                </div>
            </article>

        <?php endwhile; ?>

    <?php else: ?>

        <div class="empty-state">
            <p><em>No posts available yet. Create your first post!</em></p>
            <a href="create.php" class="btn btn-primary">+ Create New Post</a>
        </div>

    <?php endif; ?>

</div>

</body>
</html>
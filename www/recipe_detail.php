<?php
// Simplified recipe detail page: only show the recipe name for the given id
require 'database_connection.php';

// Get id from query param, cast to int for safety
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$name = '';
if ($id > 0) {
    $sql = "SELECT name FROM recipes WHERE id = $id LIMIT 1";
    $res = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recept naam</title>
</head>
<body>
    <?php if ($name !== ''): ?>
        <h1><?php echo htmlspecialchars($name); ?></h1>
    <?php else: ?>
        <p>Recept niet gevonden.</p>
    <?php endif; ?>
</body>
</html>
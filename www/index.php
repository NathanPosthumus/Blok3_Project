<?php
require 'database_connection.php';

$sql = "SELECT * FROM recipes";
$result = mysqli_query($conn, $sql);
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recepten</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800;900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Recepten</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($recipes as $r) { ?>
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="images/<?php echo htmlspecialchars($r['image']); ?>" alt="<?php echo htmlspecialchars($r['name']); ?>" class="w-full h-40 object-cover rounded">
                    <h2 class="mt-3 font-bold text-lg"><?php echo htmlspecialchars($r['name']); ?></h2>
                    <p class="text-sm text-gray-600"><?php echo htmlspecialchars($r['category']); ?></p>
                    <p class="mt-2 text-sm font-semibold"><?php echo $r['prep_time'] + $r['cook_time']; ?> min • <?php echo $r['servings']; ?> porties</p>
                    <a href="recipe_detail.php?id=<?php echo $r['id']; ?>" class="inline-block mt-3 text-sm text-white bg-purple-600 px-3 py-2 rounded">Meer →</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
<?php

// index.php
// - Verbind met database via database_connection.php
// - Haal alle recepten op uit de tabel 'recipes'
// - $recipes is een array van associative arrays, elke array bevat kolommen uit recipes.sql

require 'database_connection.php';

$sql = "SELECT * FROM recipes";
$result = mysqli_query($conn, $sql);
$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Einde PHP-logica. Hieronder volgt de eenvoudige HTML-presentatie.

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        body, h1, h2, h3, h4, h5, h6, .widget-title {
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gradient-to-br from-purple-100 via-pink-50 to-pink-200 text-gray-900 font-sans">

<?php require 'nav.php'; ?>

    <main class="flex-grow flex flex-col items-center px-2 py-6">
        <!-- Hero Section -->
        <section class="w-full max-w-3xl mx-auto text-center mb-8">
            <h2 class="text-3xl font-black text-gray-900 mb-2 tracking-tight">Ontdek heerlijke recepten</h2>
            <p class="text-base text-gray-700 font-semibold mb-4">Van snelle maaltijden tot luxe gerechten, vind jouw favoriet!</p>
            <div class="flex justify-center gap-2">
                <a href="#recepten" class="px-4 py-2 rounded-full bg-purple-700 text-white font-bold text-base shadow-lg hover:bg-purple-800 transition">Bekijk recepten</a>
            </div>
        </section>

        <!-- Recipe Grid -->
        <section id="recepten" class="w-full max-w-5xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($recipes as $recipe) { ?>
                <div class="flex flex-col items-center bg-white rounded-2xl shadow-xl border border-purple-200 p-0 mb-6 fade-in">
                    <div class="w-full h-40 rounded-t-2xl overflow-hidden flex items-center justify-center bg-gray-100 relative">
                        <img src="images/<?php echo ($recipe['image'] ?? 'placeholder.jpg'); ?>" class="object-cover w-full h-full rounded-t-2xl" style="height:100%;width:100%;min-height:160px;max-height:160px;" loading="lazy" alt="<?php echo htmlspecialchars($recipe["name"] ?? 'Recept'); ?>">
                        <?php
                            $badgeClass = "bg-green-500";
                            if ($recipe["difficulty"] == "Medium") $badgeClass = "bg-yellow-500 text-gray-900";
                            if ($recipe["difficulty"] == "Hard") $badgeClass = "bg-red-600";
                        ?>
                        <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-extrabold text-white shadow-lg tracking-wide <?php echo $badgeClass; ?>">
                            <?php echo ($recipe["difficulty"] ?? 'Easy'); ?>
                        </span>
                    </div>
                    <div class="flex flex-col flex-1 w-full px-4 py-4 rounded-b-2xl bg-gradient-to-b from-white via-purple-50 to-pink-50 text-center">
                        <div class="flex items-center justify-center gap-2 mb-2 flex-wrap">
                            <span class="px-2 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-700 shadow"><?php echo ($recipe["category"] ?? ''); ?></span>
                            <?php if ($recipe["vegetarian"]) { ?>
                                <span class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 shadow">Vegetarisch</span>
                            <?php } ?>
                        </div>
                        <h3 class="mb-2 text-lg font-extrabold text-gray-900 leading-tight tracking-tight"><?php echo ($recipe["name"] ?? ''); ?></h3>
                        <div class="flex items-center justify-center gap-4 mb-4 font-bold text-base">
                            <span><?php echo ($recipe["prep_time"] + $recipe["cook_time"]); ?> min</span>
                            <span><?php echo ($recipe["servings"]); ?> porties</span>
                        </div>
                        <a href="recipe_detail.php?id=<?php echo ($recipe["id"] ?? 0); ?>" class="block w-full text-center py-2 px-3 bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white font-extrabold rounded-full transition shadow text-base mx-auto">Meer informatie →</a>
                    </div>
                </div>
            <?php } ?>
            </div>
        </section>
    </main>

   <?php require 'footer.php'; ?>

</body>
</html>
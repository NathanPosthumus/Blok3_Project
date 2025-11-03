<?php
$recept_id = $_GET['id'];


include 'database_connection.php';


$query = "SELECT * FROM recipes WHERE id = $recept_id";
$result = mysqli_query($conn, $query);
$recept = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recept details - Simple Version</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="recipe-detail-body">
    <div class="recipe-card">
        <a class="back-button" href="index.php">Terug</a>
        <h1 class="recipe-title"><?php echo ($recept['name']); ?></h1>

        <img class="recipe-image" src="images/<?php echo ($recept['image']); ?>">

        <h2 class="recipe-category">Type: <?php echo ($recept['category']); ?></h2>

        <h3 class="recipe-info-title">Informatie:</h3>
        <ul class="recipe-info-list">
            <li class="recipe-info-item">Voorbereiding: <?php echo ($recept['prep_time']); ?> min</li>
            <li class="recipe-info-item">Kooktijd: <?php echo ($recept['cook_time']); ?> min</li>
            <li class="recipe-info-item">Porties: <?php echo ($recept['servings']); ?></li>
            <li class="recipe-info-item">Moeilijkheid: <?php echo ($recept['difficulty']); ?></li>
            <li class="recipe-info-item">Calorieën per portie: <?php echo ($recept['calories_per_serving']); ?></li>
            <li class="recipe-info-item">Hoofdingrediënt: <?php echo ($recept['main_ingredient']); ?></li>
        </ul>
    </div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Nouveautés - Mon site de photos</title>
</head>
<body>
    <h1>Nouveautés</h1>

    <?php
    // Connexion à la base de données
    $db = mysqli_connect("localhost", "root", "", "photoforyou");
    // Vérifier la connexion
    if (!$db) {
        die("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }

    // Récupérer les nouvelles photos depuis la base de données
    $query = "SELECT * FROM photos ORDER BY date_publication DESC LIMIT 10";
    $result = mysqli_query($db, $query);

    // Vérifier si des résultats ont été trouvés
    if (mysqli_num_rows($result) > 0) {
        // Afficher les nouvelles photos
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<img src='" . $row['chemin_photo'] . "' alt='" . $row['titre'] . "'>";
        }
    } else {
        echo "Aucune nouvelle photo trouvée.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($db);
    ?>

</body>
</html>
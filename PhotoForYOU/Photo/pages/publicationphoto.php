<!DOCTYPE html>
<html>
<head>
    <title>Publication de photo - Mon site de photos</title>
</head>
<body>
    <h1>Publication de photo</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si le formulaire a été soumis

        // Récupérer les informations du formulaire
        $titre = $_POST["titre"];
        $cheminPhoto = "chemin/vers/le/dossier/de/stockage/" . $_FILES["photo"]["name"];

        // Vérifier si le fichier a été correctement téléchargé
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminPhoto)) {
            // Connexion à la base de données
            $conn = mysqli_connect("localhost", "utilisateur", "motdepasse", "nom_de_la_base_de_donnees");

            // Vérifier la connexion
            if (!$conn) {
                die("Erreur de connexion à la base de données: " . mysqli_connect_error());
            }

            // Insérer les informations de la photo dans la base de données
            $query = "INSERT INTO photos (titre, chemin_photo) VALUES ('$titre', '$cheminPhoto')";
            if (mysqli_query($conn, $query)) {
                echo "La photo a été publiée avec succès!";
            } else {
                echo "Erreur lors de la publication de la photo: " . mysqli_error($conn);
            }

            // Fermer la connexion à la base de données
            mysqli_close($conn);
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <label for="titre">Titre de la photo:</label>
        <input type="text" id="titre" name="titre" required><br>

        <label for="photo">Sélectionner une photo:</label>
        <input type="file" id="photo" name="photo" required><br>

        <input type="submit" value="Publier">
    </form>

</body>
</html>
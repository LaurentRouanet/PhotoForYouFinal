<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une photo</title>
</head>
<?php
// Inclure vos fichiers ici
include ('../include/entete.inc.php');
?>
<body>
    <h1>Ajouter une photo</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="nom_photo">Nom de la photo :</label>
        <input type="text" id="nom_photo" name="nom_photo" required><br><br>

        <label for="image">Sélectionner une image :</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>


        <input type="submit" value="Ajouter la photo">
    </form>
</body>
</html>
<?php

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_photo = $_POST['nom_photo'];

    // Récupérer les informations sur le fichier image
    $image_info = $_FILES['image'];
    
    // Récupérer les dimensions de l'image
    $dimensions = getimagesize($image_info['tmp_name']);
    $taille_pixels_x = $dimensions[0];
    $taille_pixels_y = $dimensions[1];

    $poids = $image_info['size']; // Taille du fichier en octets
    $cheminfichier = 'Photo/imagesstockees/' ;
    $cheminimage = $cheminfichier . basename($image_info['name']);

    // Créer une instance de la classe Photo avec les données du formulaire
    $photo = new Photo([
        'NomPhoto' => $nom_photo,
        'TaillesPixelsX' => $taille_pixels_x,
        'TaillesPixelsY' => $taille_pixels_y,
        'Poids' => $poids,
        'Lien' => $cheminimage
    ]);

    // Afficher le vardump des variables et de l'objet photo
    echo "<pre>";
    var_dump($nom_photo, $taille_pixels_x, $taille_pixels_y, $poids, $cheminimage, $photo);
    echo "<pre>";
    // Ajouter la photo à la base de données en utilisant la méthode add
    $photoManager = new PhotoManager($db); // Supposons que vous ayez une classe PhotoManager pour gérer les opérations sur les photos
    $photoManager->add($photo);
    exit();
}

?>
<?php
include("../include/piedDePage.inc.php");
?>

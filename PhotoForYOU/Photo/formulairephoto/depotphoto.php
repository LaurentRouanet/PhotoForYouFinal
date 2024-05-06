<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire vente de photos</title>
</head>
<body>
    <?php 
        include_once('./include/menu.inc.php');

    ?>
    <h1>A vos marques, prêts, vendez vos photos!</h1>
    <h2>Mes photos</h2>

    <!-- Ajoutez une photo -->
    <form action="traitement_upload.php" method="post" enctype="multipart/form-data">
        <div class="container mt-3">
            <label for="image">Sélectionnez une image :</label>
            <input type="file" name="image" id="image" accept="image/*" multiple="false">
            <input  class="form-control mt-3" type="number" name="nbredephoto" value="1" readonly>
            <button  type="submit"  class="btn btn-primary" name="submit">Ajouter l'image</button>
        </div>
    </form>


</body>
</html>
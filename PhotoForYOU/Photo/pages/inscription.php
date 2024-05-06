<?php
include ("include/entete.inc.php");
if (isset($_POST['valider']))
{
  // à securiser (filtration des données avant ajout dans la BDD)
  $user = new User(['Nom' => $_POST['nom'], 'Prenom' => $_POST['prenom'], 'Mail' => $_POST['mail'], 'Mdp' => $_POST['motdepasse1'],  'Type' => $_POST['choixType']]); 
  $manager->add($user);
  header('Location: inscriptionOK.php'); 
}

?>
 
	<div class="container">
    <?php echo generationEntete("Inscription", "Merci de remplir ce formulaire d'inscription.") ?>
    <div class="jumbotron">
    <form method="post"  id="form"  novalidate>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="prenom">Prénom</label>
          <input type="text" class="form-control" name="prenom" id="prenom" pattern="[A-Za-zÀ-ÿ\-]{3,30}" placeholder="Votre prénom" required>
          <div class="invalid-feedback">
            Le champ prénom est obligatoire
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" name="nom" id="nom" pattern="[A-Za-zÀ-ÿ\-]{3,30}" placeholder="Votre nom" required>
          <div class="invalid-feedback">
            Les champ nom est obligatoire
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="email">Adresse électronique</label>
          <input type="email" class="form-control" name="mail" id="email"  placeholder="Courriel" required>
          <small id="emailHelp" class="form-text text-muted">Nous ne partagerons votre email.</small>
          <div class="invalid-feedback">
            Vous devez fournir un email valide.
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse1">Votre mot de passe</label>
          <input type="password" class="form-control" name="motdepasse1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4 mb-3">
          <label for="motDePasse2">Confirmation du mot de passe</label>
          <input type="password" class="form-control" name="motdepasse2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" required>
          <div name="message" class="invalid-feedback">
            Mot de passe invalide il faut minimum 8 caractères une majuscule et une minuscule et un chiffre 
          </div>
          <div class="invalid-feedback" id="motdepasseErreur"></div> 
  
        </div>
      </div>

      <!-- Choix entre Client ou Photographe -->
      <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-info">
          <input type="radio" name="choixType" id="client" value="client" checked>
          Client
        </label>
        <label class="btn btn-info">
          <input type="radio" name="choixType" id="Photographe" value="Photographe">
          Photographe
        </label>
      </div>

      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="emailPromo">
          <label class="form-check-label" for="emailPromo">
            Oui, je veux recevoir des sources d’inspiration visuelles, des offres spéciales et autres communications par e-mail. 
          </label>
        </div>
      </div>
      <input type="submit" value="Valider" class="btn btn-primary" name="valider" />
    </form>
  </div>

  
  <script>
  (function() {
    "use strict"
    window.addEventListener("load", function() {
      var form = document.getElementById("form")
      form.addEventListener("submit", function(event) 
      {
        if (form.checkValidity() == false) 
        {
          event.preventDefault()
          event.stopPropagation()
        }
        if (form.motdepasse2.value != form.motdepasse1.value)
        {
          document.getElementById('motdepasseErreur').innerHTML="Les deux mots de passe ne sont pas identiques"
          console.log(form.motdepasse2.value+" "+form.motdepasse1.value)
          event.preventDefault()
          event.stopPropagation()
        }
        else
        {
          document.getElementById('motdepasseErreur').innerHTML=""
        }
        form.classList.add("was-validated")
      }, false)
    }, false)
  }())
  </script>

  <?php
    include ("include/piedDePage.inc.php");
  ?>
</body>
</html>
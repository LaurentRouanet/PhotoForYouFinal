<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">PhotoForYou</a>
    <div class="container-fluid">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="photo.php">Photo</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tarifs</a>
          <ul class="dropdown-menu">
          <?php
              if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                  $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
                  //var_dump($_SESSION);
                  if (($userId !== null)&& ($_SESSION['user_type'] !=null )) {
                    $userType = $_SESSION['user_type'] ;
                    var_dump($userType);
                    // Maintenant, vous pouvez chercher Habilisation dans la table menu
                     if ($userType === "client") {
                         echo '<li><a class="dropdown-item" href="achat.php">Acheter</a></li>';
                    } elseif ($userType === "photographe") {
                         echo '<li><a class="dropdown-item" href="depotphoto.php">Vendre</a></li>';
                    }
                }
                    
              }
              ?>

            
            <li><a class="dropdown-item" href="pluspopulaires.php">Les plus populaires</a></li>
            <li><a class="dropdown-item" href="nouveautes.php">Les nouveautés</a></li>
          </ul>
        </li>
        <div class="ms-auto">
          <form class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Chercher">
            <button class="btn btn-primary" type="button">Chercher</button>
          </form>
        </div>
        <?php
        
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
          echo '
          <ul class="navbar-nav mr-right">
            <li class="nav-item">
              <a class="nav-link btn btn-outline-dark"  href="deconnexion.php">Deconnexion</a>
            </li>
        </ul> 
            ';
        } else {
          echo '
           
            <ul class="navbar-nav mr-right">
              <li class="nav-item">
                <a class="nav-link btn btn-outline-dark" href="inscription.php">S\'inscrire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-dark"  href="connexion.php">S\'identifier</a>
              </li>
            </ul>';
        }
        ?>
        
      </ul>
    </div>
  </div>
</nav>
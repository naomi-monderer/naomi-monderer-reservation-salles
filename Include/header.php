<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/225d5fd287.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/include/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="favicon" rel="shortcut icon" href="assets/images/logo/stars-sky.ico" type="image/x-con">
    <link rel="stylesheet" href="assets/styles/reservation-salles.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $title; ?> </title>
</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <?php if (isset($_SESSION['user']['login'])) {  ?>
          <a class="nav-item nav-link active" href="planning.php">Réservation de Salle<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="profil.php">Profil</a>
          <a class="nav-item nav-link disabled" href="deconnexion.php">Déconnexion</a>
        <?php } else { ?>
          <!-- //Non connecté -->
          <a href="inscription.php" class="nav-item nav-link">Inscription</a>
          <a href="connexion.php" class="nav-item nav-link">Connexion</a>
        <?php } ?>
      </div>
    </div>
  </nav>
</header>
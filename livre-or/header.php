<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="header">
    <div class="container">

      <nav class="nav-links">
        <a href="index.php"><i class="fas fa-user-plus"></i> Accueil</a>
        <a href="livre-or.php"><i class="fas fa-book"></i> Livre d'or</a>
      </nav>

      <div class="nav-buttons">
  <?php if (isset($_SESSION['user_id'])): ?>
      <a href="profil.php" class="btn login">Mon profil</a>
  <?php else: ?>
      <a href="connexion.php" class="btn login">Se connecter</a>
      <a href="inscription.php" class="btn register">S'inscrire</a>
  <?php endif; ?>
</div>

    </div>
  </header>
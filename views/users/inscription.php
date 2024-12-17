<?php
    include "../../header.php";
    include_once '../../navbar.php';
?>


<form action="../../action/auth/inscriptionAction.php" method="POST" class="container p-4 shadow rounded bg-light my-4">
  <!-- Champ Nom -->
  <div class="mb-3">
    <label for="nom" class="form-label fw-bold">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
  </div>

  <!-- Champ Prénom -->
  <div class="mb-3">
    <label for="prenom" class="form-label fw-bold">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
  </div>

  <!-- Champ Email -->
  <div class="mb-3">
    <label for="email" class="form-label fw-bold">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
  </div>

  <!-- Champ Mot de passe -->
  <div class="mb-3">
    <label for="password" class="form-label fw-bold">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
  </div>

  <!-- Champ Statut -->
  <div class="mb-3">
    <label for="statut" class="form-label fw-bold">Statut</label>
    <select class="form-select" id="statut" name="statut" required>
      <option value="" disabled selected>Choisissez un statut</option>
      <option value="admin">Admin</option>
      <option value="user">User</option>
    </select>
  </div>

  <!-- Bouton d'inscription -->
  <button type="submit" name="ajouter" class="btn btn-primary w-100">Ajouter</button>
</form>

<?php
    include "../../footer.php"
?>

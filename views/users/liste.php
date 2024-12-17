<?php
include "../../header.php";
include_once '../../navbar.php';
require('../../config/database/users_db.php');

$users = getAllUsers();
?>

<main class="m-5">
  <h1>
    La liste des utilisateurs
  </h1>

  <!-- Message de succès -->
  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= htmlspecialchars($_GET['prenom'] . " " . $_GET['nom']) ?> ajouté(e) avec succès !
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="d-flex my-3">
    <a href="inscription.php" class="btn btn-primary ms-auto fw-bolder p-2">S'Inscrire</a>
  </div>

  <table class="table mt-4" id="myTable">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Rôle</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      <?php while($user = $users->fetch(PDO::FETCH_OBJ)): ?>
      <tr>
        <td><?= htmlspecialchars($user->id) ?></td>
        <td><?= htmlspecialchars($user->nom) ?></td>
        <td><?= htmlspecialchars($user->prenom) ?></td>
        <td><?= htmlspecialchars($user->designation) ?></td> 
        <td><?= htmlspecialchars($user->email) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

<?php
include "../../footer.php";
?>

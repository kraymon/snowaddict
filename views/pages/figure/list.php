<?php ob_start(); ?>

<div class="container mb-3">
  <?php if(isset($isDelete)) { ?>
    <div class="alert alert-success" role="alert">
      Votre figure a bien été supprimée.
    </div>
  <?php } ?>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Picture path</th>
        <th scope="col">Video path</th>
        <th scope="col">Created date</th>
        <th scope="col">Updated date</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($figures as $figure) { ?>
      <tr>
        <th scope="row">
          <?= $figure->getId(); ?>
        </th>
        <td>
          <?= $figure->getName(); ?>
        </td>
        <td>
          <?= $figure->getDescription(); ?>
        </td>
        <td>
          <?= $figure->getPicturePath(); ?>
        </td>
        <td>
          <?= $figure->getVideoPath(); ?>
        </td>
        <td>
          <?= $figure->getCreatedAt(); ?>
        </td>
        <td>
          <?= $figure->getUpdatedAt(); ?>
        </td>
        <td>
          <a href="/index.php?action=update&controller=figure&id=<?= $figure->getId(); ?>">
            <button class="btn btn-primary btn-sm">
              <i class="fa-solid fa-pen-to-square"></i>
            </button>

            <button class="btn btn-success btn-sm">
              <i class="fa-solid fa-eye"></i>
            </button>

            <a href="/index.php?action=list&controller=figure&id=<?= $figure->getId(); ?>">
              <button class="btn btn-danger btn-sm">
                <i class="fa-solid fa-trash"></i>
              </button>
            </a>
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once('views/layout.php'); ?>
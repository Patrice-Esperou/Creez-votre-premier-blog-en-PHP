<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>


<h2>Modifier le blog....!   &#128522</h2>  
    <br><br> 
    <form action="index.php" method="POST">
           
    <div class="mb-3">
          <label for="author" class="form-label">Auteur</label>
          <input type="text" class="form-control"name="author" value="<?= $author; ?>">
    </div>
    <div class="mb-3">
         <label for="title" class="form-label">Titre</label>
         <input type="text" class="form-control"name="title" value="<?= $title; ?>">
    </div>
    <div class="mb-3">
         <label for="content" class="form-label">Contenu</label>
         <textarea name="content" class="form-control"><?= $content; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="valider">Envoyer</button>
    </form>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>  
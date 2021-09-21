<?= $title = 'Mon blog';?>

<?= ob_start(); ?>


  <?php
    while ($data = $posts->fetch())
   {
  ?> 
       <div class="container">
         <div class="card-deck" style="width:50%">
           <div class="card">
             <h3 class="card-header"> <?= $data['author'];?></h3> 
                
               <ul class="card-body">
                <li class="list-group-item">Le <?= $data['createdAt']; ?></li>
                <li class="list-group-item"><?= $data['title']; ?></li>
                <li class="list-group-item"><?= $data['content']; ?></li>
               </ul>
        <a href="deleteBlog.php?action=post&amp;id=<?= $data['id']; ?>">
                <button style="color: white; background-color: red; margin-bottom: 10px;">Supprimer le blog </button>
        </a>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                <button style="color: black; background-color: yellow; margin-bottom: 10px;">Modifier le blog </button>
        </a>
        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                <button style="color: white; background-color: green; margin-bottom: 10px;">Voir & ajouter un commentaire </button>
        </a>
       
   </div></div></div>
    <?php
   }
   $posts->closeCursor();
   ?>
   <?= $content = ob_get_clean(); ?>
   <?= require('template.php'); ?>
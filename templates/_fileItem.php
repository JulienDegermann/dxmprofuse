<div class="flex item">

  <div>
    <span class="bold"><?= $file['filename'] ?></span><br>
    <span><?= $file['size']/(1024) > 1024 ? round($file['size']/pow(1024, 2), 2) . ' MO' : floor($file['size']/(1024)) . ' KO' ?> </span>
  </div>
  <button class="delete" id="<?= $file['id'] ?>" aria-label="supprimer le fichier">
    <?php include './src/assets/icons/trash.svg'; ?>
  </button>
  </button>
</div>
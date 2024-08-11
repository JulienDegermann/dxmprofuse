<div class="flex item">

  <div>
    <span class="bold"><?= $file['filename'] ?></span><br>
    <span><?= $file['size'] ?> </span>
  </div>
  <button class="delete" id="<?= $file['id'] ?>">
    <?php include './src/assets/icons/trash.svg'; ?>
  </button>
  </button>
</div>
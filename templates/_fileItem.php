<div class="flex item">

  <div>
    <span class="bold"><?= $file['filename'] ?></span><br>
    <span><?= $file['size']/(1024) > 1024 ? round($file['size']/(1024 * 1024), 2) . ' Mb' : floor($file['size']/(1024)) . ' Kb' ?> </span>
  </div>
  <button class="delete" id="<?= $file['id'] ?>">
    <?php include './src/assets/icons/trash.svg'; ?>
  </button>
  </button>
</div>
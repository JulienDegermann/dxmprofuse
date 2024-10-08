<?php
  // constants
  include_once './src/core/uploadSettings.php';

  // files management
  include_once './src/api/getFiles.php';
  include_once './src/api/addFiles.php';
  include_once './src/api/removeFiles.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" type="text/css" href="./src/assets/style/style.css" /> -->
  <link rel="stylesheet" type="text/css" href="/dxmprofuse/src/assets/style/style.css" />

  <title>File Loader</title>
</head>

<body>
  <section id="file-loader">
    <div class="flex">
      <form action="" method="POST" enctype="multipart/form-data" class="flex">
        <?php include_once './src/assets/icons/download.svg'; ?>
        <label class="bold" for="files">Glisser & Déposer <br /> vos fichiers <br /> ici</label>
        <input id="files" type="file" name="files[]" multiple aria-label="charger des fichiers">
      </form>
      <div class="files">
        <div class="scroll">
          <?php
          foreach ($files as $key => $file) {
            include './templates/_fileItem.php';
          }
          ?>
        </div>

      </div>
    </div>
  </section>
  <script type="module" src="./src/assets/js/script.js"></script>
</body>

</html>
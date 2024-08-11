<?php
include_once '../config/pdo.php';
include_once '../core/uploadSettings.php';

include_once 'filesRepo.php';

$id = intval($_GET['id']);

$file = findFile($pdo, $id);

if(is_file(UPLOAD_DIR . $file['filename'])) {

  unlink(UPLOAD_DIR . $file['filename']);
  var_dump('fichier existe');
}

$removed = deleteFile($pdo, $id);
if ($removed) {
  header('Location: /dxmprofuse/');
  exit();
}

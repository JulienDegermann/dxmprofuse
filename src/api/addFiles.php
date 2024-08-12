<?php
include_once '../config/pdo.php';
include_once 'filesRepo.php';
include_once '../core/uploadSettings.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES)) {

  // get files
  $files = $_FILES['files'];

  // remove files not being pdf or jpeg
  foreach ($files['type'] as $key => $value) {
    if ($value !== 'application/pdf' && $value !== ('image/jpeg')) {
      foreach ($files as $property => $values) {
        unset($files[$property][$key]);
      }
    }
  }

  // uniq file name
  foreach ($files['name'] as $key => $name) {
    $files['name'][$key] = uniqid() . $name;
  }

  // prepare an array of files
  $newFiles = [];
  foreach ($files['name'] as $key => $value) {
    $newFiles[$key] = [
      'name' => $files['name'][$key],
      'size' => $files['size'][$key],
      'tmp_name' => $files['tmp_name'][$key]
    ];
  }

  // store datas in database
  $sendFile = addFiles($pdo, $newFiles);

  // save files on server
  if ($sendFile) {
    foreach ($newFiles as $file) {
      move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $file['name']);
    }

    header('location: /');
  }
}
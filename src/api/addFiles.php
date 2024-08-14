<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {

  // get added files
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
    $files['name'][$key] = uniqid() . htmlentities($name);
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

  foreach($newFiles as $file) {
    move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $file['name']);
  }

  header('Location: /dxmprofuse/' );
}

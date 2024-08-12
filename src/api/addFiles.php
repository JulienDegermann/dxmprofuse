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

  $newFiles = [];
  // var_dump($files);
  foreach ($files['name'] as $key => $value) {
    $newFiles[$key] = [
      'name' => $files['name'][$key],
      'size' => $files['size'][$key],
      'tmp_name' => $files['tmp_name'][$key]
    ];
  }

  // $sendFile = addFile($pdo, $files['name'], $files['size']);
  $sendFile = addFiles($pdo, $newFiles  );

  if ($sendFile) {
    // $files = explode(', ', $files['tmp_name']);

    foreach($newFiles as $file) {

      move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $file['name']);
    }


    // $response = json_encode(['message' => 'success']);

    // // send response to JS
    // echo $response;
    // exit;

    header('location: /dxmprofuse/index.php');
  } else {
    echo json_encode(['message' => 'error']);
    exit();
  }
}

//   if ($file['type'] !== 'image/jpeg' && $file['type'] !== 'application/pdf') {

//     throw new Exception('Mauvais format de fichier');
//     return;
//   }

//   $size = $file['size'];
//   $fileName = uniqid() . $file['name'];
//   $tmpName = $file['tmp_name'];

//   $sendFile = addFile($pdo, $fileName, $size);
//   if ($sendFile) {
//     move_uploaded_file($tmpName, UPLOAD_DIR . $fileName);

//     $response = json_encode(['message' => 'success']);

//     // send response to JS
//     echo $response;
//     exit;
//   }
// } else {
//   echo json_encode(['message' => 'error']);
//   exit();
// }

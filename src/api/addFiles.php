<?php
include_once '../config/pdo.php';
include_once 'filesRepo.php';
include_once '../core/uploadSettings.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES)) {
  echo json_encode(['test'=> $_FILES]);
  exit();
  $file = $_FILES['files'];



  if ($file['type'] !== 'image/jpeg' && $file['type'] !== 'application/pdf') {

    throw new Exception('Mauvais format de fichier');
    return;
  }

  $size = $file['size'];
  $fileName = uniqid() . $file['name'];
  $tmpName = $file['tmp_name'];

  $sendFile = addFile($pdo, $fileName, $size);
  if ($sendFile) {
    move_uploaded_file($tmpName, UPLOAD_DIR . $fileName);

    $response = json_encode(['message' => 'success']);

    // send response to JS
    echo $response;
    exit;
  }
} else {
  echo json_encode(['message' => 'error']);
  exit();
}

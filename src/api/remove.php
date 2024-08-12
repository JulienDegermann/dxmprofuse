<?php

// global settings, database connection and functions
include_once '../config/pdo.php';
include_once '../core/uploadSettings.php';
include_once 'filesRepo.php';

$id = intval($_GET['id']);

$file = findFile($pdo, $id);

// redirect if no file found
if(!$file) {
  header('Location: /');
  exit();
}

if (!$file) {
  header('Location: /');
}

if (is_file(UPLOAD_DIR . $file['filename'])) {
  unlink(UPLOAD_DIR . $file['filename']);
}

if (!is_file(UPLOAD_DIR . $file['filename'])) {
  $removed = deleteFile($pdo, $id);
  if ($removed) {
    header('Location: /');
    exit();
  }
}

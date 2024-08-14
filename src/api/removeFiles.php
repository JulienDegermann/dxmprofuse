<?php
if (isset($_GET['key']) && is_numeric($_GET['key'])) {
  $key = htmlentities($_GET['key']);
  
  // file to remove
  $file = $files[$key];

  if (file_exists(UPLOAD_DIR . $file['filename']) && is_file(UPLOAD_DIR . $file['filename'])) {
    unlink(UPLOAD_DIR . $file['filename']);
    header('Location: /dxmprofuse/');
  }
}

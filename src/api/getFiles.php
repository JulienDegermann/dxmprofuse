<?php

// get uploads directory content
// $filesFromDir = scandir('public/uploads/');
$filesFromDir = scandir(UPLOAD_DIR);

// remove anything not being pdf or jpeg
foreach ($filesFromDir as $key => $file) {
  if (!is_file('public/uploads/' . $file) || $file == '.gitignore') {
    unset($filesFromDir[$key]);
  }
}

$files = [];
// get files propeties
foreach ($filesFromDir as $file) {
  $files[] = [
    'filename' => $file,
    'size' => filesize(UPLOAD_DIR . $file),
    'type' => mime_content_type(UPLOAD_DIR . $file)
  ];
}
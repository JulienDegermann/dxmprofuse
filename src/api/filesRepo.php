<?php

/**
 * @param PDO $pdo PDO instance
 * @return array Array of files (filename + id)
 */
function getFiles(PDO $pdo): array
{
  $sql = "SELECT * FROM files ORDER BY id DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $files = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;

  return $files;
}

/**
 * @param PDO $pdo PDO instance
 * @param int $id file id
 * @return array file (filename + id + size)
 */
function findFile(PDO $pdo, int $id): array|bool
{
  $sql = "SELECT * FROM files WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $file = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;

  return $file;
}

/**
 * @param PDO $pdo PDO instance
 * @param int $id file id
 */
function deleteFile(PDO $pdo, int $id)
{
  $sql = "DELETE FROM files WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

/**
 * @param PDO $pdo : PDO instance
 * @param string $filename : file name
 * @param int $size : file size (ko)
 */
function addFile(PDO $pdo, string $filename, string $size): bool
{

  $sql = "INSERT INTO files (filename, size) VALUES (:filename, :size)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':filename', $filename, PDO::PARAM_STR);
  $stmt->bindParam(':size', $size, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}


/**
 * @param PDO $pdo : PDO instance
 * @param array $files : array of files (string filename + int size)
 * @return bool : return if insert is success
 */
function addFiles(PDO $pdo, array $files): bool
{

  $sql = "INSERT INTO files (filename, size) VALUES ";

  $values = [];
  $params = [];
  foreach ($files as $key => $file) {
    $values[] = '(:filename' . $key . ', :size' . $key . ')';
    $params[':filename' . $key] = $file['name'];
    $params[':size' . $key] = $file['size'];
  }

  $sql .= implode(', ', $values);
  $sql .= ';';

  var_dump($sql);
  $stmt = $pdo->prepare($sql);


  foreach ($params as $key => $param) {
    if (strpos($key, 'filename')) {
      $stmt->bindValue($key, $params[$key], PDO::PARAM_STR);
    }
    if (strpos($key, 'size')) {
      $stmt->bindValue($key, $params[$key], PDO::PARAM_INT);
    }
  }

  //   foreach ($params as $key => $value) {
  //     if (strpos($key, 'filename') !== false) {
  //         $stmt->bindValue($key, $value, PDO::PARAM_STR);
  //     } else {
  //         $stmt->bindValue($key, $value, PDO::PARAM_INT);
  //     }
  // }

  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

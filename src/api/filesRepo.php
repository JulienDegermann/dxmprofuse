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
 * @param PDO $pdo PDO instance
 * @param string $filename file name
 * @param int $size file size (ko)
 */
function addFile(PDO $pdo, string $filename, int $size): bool
{
  $sql = "INSERT INTO files (filename, size) VALUES (:filename, :size)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':filename', $filename, PDO::PARAM_STR);
  $stmt->bindParam(':size', $size, PDO::PARAM_INT);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}

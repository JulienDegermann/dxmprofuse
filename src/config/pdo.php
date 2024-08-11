<?php
// mysql settings
$host = '127.0.0.1';
$db_name = 'dxmprofuse';
$db_user = 'root';
$db_password = 'E11a072f!';

// PDO connexion
try {
  $pdo = new PDO('mysql:host=' . $host . ';port=3306;dbname=' . $db_name . ';charset=utf8', $db_user, $db_password);
} catch (PDOException $e) {
  echo 'Connexion échouée : ' . $e->getMessage();
}

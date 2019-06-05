<?
try {
  $pdo = new PDO(
    'mysql:dbname=tech_test_db;host=mysql;charset=utf8',
    'root',
    'secret',
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  );
  $msg = '接続OK';
} catch (PDOException $e) {
  header('Content-Type: text/plain; charset=UTF-8', true, 500);
  exit($e->getMessage()); 
}


<?php

require_once './rws-php-sdk/autoload.php';
require_once './db/pdo.config.php';

function func($genre_id) {
  $client = new RakutenRws_Client();
  $client->setApplicationId('1026301013779899297');
  $response = $client->execute('IchibaGenreSearch', array(
    'genreId' => $genre_id,
    'genrePath' => 0,
    'formatVersion' => 2,
  ));

  global $pdo;
  $stmt = $pdo -> prepare("INSERT INTO genres (genre_name, genre_id, parent_id, created, modified)
  VALUES (:genre_name, :genre_id, :parent_id, now(), now())");
  
  if ($response->isOk()) {
    foreach($response['children'] as $childGenre) {
      $stmt->bindParam(':genre_name', $childGenre['genreName'], PDO::PARAM_STR);
      $stmt->bindValue(':genre_id', $childGenre['genreId'], PDO::PARAM_INT);
      $stmt->bindValue(':parent_id', $genre_id, PDO::PARAM_INT);
      $stmt->execute();
      if($childGenre['genreLevel'] === 4) {
        echo 'insert完了';
        break;
      }
      func($childGenre['genreId']); 
    }
  } else {
    echo 'Error:'.$response->getMessage();
  }
}

func(0);

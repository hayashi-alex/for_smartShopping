<?

require_once './rws-php-sdk/autoload.php';
require_once './db/pdo.config.php';

function get_genre_id() {
  global $pdo;
  $sql = "SELECT genre_id FROM genres";
  $stmt = $pdo -> query($sql);
  $data = $stmt->fetchAll();
  $genre_ids = array_column($data, 'genre_id');
  return $genre_ids;
}

function fetch_items($genre_id) { 
  $client = new RakutenRws_Client();
  $client->setApplicationId('1026301013779899297');
  $response = $client->execute('IchibaItemRanking', array(
    'genreId' => $genre_id,
    'formatVersion' => 2
  ));
  if ($response->isOk()) {
    return $response['Items'];
  } else {
    echo 'Error:'.$response->getMessage();
  }
}

function main() {
  $genre_ids = get_genre_id();
  foreach($genre_ids as $genre_id) {
    $items = fetch_items($genre_id);    
    foreach($items as $item) {
      ($item['itemName']);
    }
  }
}

hogehoge();



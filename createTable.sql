create table `genres` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "ID",
  `genre_name` VARCHAR(100) NOT NULL COMMENT "ジャンル名",
  `genre_id` int NOT NULL COMMENT "ジャンルID",
  `parent_id` int NOT NULL COMMENT "親ID",
  `created` datetime DEFAULT NULL COMMENT "登録日",
  `modified` datetime DEFAULT NULL COMMENT "更新日"
)


create table `rank_items` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "ID",
  `genre_id` int NOT NULL COMMENT "ジャンルID",
  `item_name` VARCHAR(100) NOT NULL COMMENT "商品名",
  `rank` int NOT NULL COMMENT "ランキング",
  `created` datetime DEFAULT NULL COMMENT "登録日",
  `modified` datetime DEFAULT NULL COMMENT "更新日"
)

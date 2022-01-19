<?php

namespace App\Model;

use App\Model\Connect;
use \PDO;
use \PDOStatement;

class GetPostTags
{
  public function __construct()
  {
  }

  public function getPostTags(): array
  {
    $con = new Connect();

    $sql = "SELECT DISTINCT tag FROM article";
    $items = $con->SQL($sql);

    $tagsArry = $this->makeTagList($items);

    return $tagsArry;
  }

  private function makeTagList(PDOStatement $tags): array
  {
    $tagsArry = array(); //空の配列
    foreach ($tags as $tag) :
      // $tagSpritは配列
      $tagSprit = preg_split("/[\s,]+/", $tag['tag']); //データベースすべてのタグをスプリット
      foreach ($tagSprit as $item) :
        //スプリットしたタグを配列に入れていく
        array_push($tagsArry, $item);
      endforeach;
    endforeach;
    //タグが重複しているため削除
    $tagsArry = array_unique($tagsArry);
    //文字数順にソート
    array_multisort(array_map("strlen", $tagsArry), SORT_ASC, $tagsArry);
    return $tagsArry;
  }
}

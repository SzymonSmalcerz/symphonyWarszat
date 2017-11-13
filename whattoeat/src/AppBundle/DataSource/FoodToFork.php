<?php
namespace AppBundle\DataSource;

use Buzz\Browser;
use AppBundle\Model\FoodItem;

class FoodToFork
{
  private $apiKey = '7e162dc8f2e7d06b24c3f889f46ef904';

  public function getRecipe(){

    $b = new Browser();

    $response = $b->get('http://food2fork.com/api/search?key='.$this->apiKey);

    $recipes =  json_decode($response->getContent(),true);

    $recipe = $recipes["recipes"][rand(0,((int) $recipes['count']) -1)];

    $foodItem = new FoodItem();
    $foodItem->title = $recipe["title"];
    $foodItem->image = $recipe["image_url"];
    $foodItem->link = $recipe["source_url"];

    return $foodItem;
  }
}

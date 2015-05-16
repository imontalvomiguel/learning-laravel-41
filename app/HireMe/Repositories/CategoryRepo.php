<?php

// Le establecemos un namespace a esta clase
namespace HireMe\Repositories;
// Debemos indicarle de que name space viene Category
use HireMe\Entities\Category;

class CategoryRepo
{

  public function find($id)
  {
    $category = Category::find($id);
    return $category;
  }

  public function getList() {
    return Category::lists('name', 'id');
  }

}

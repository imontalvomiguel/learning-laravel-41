<?php

// Debo el namespace donde se encuentra la clase Category
// Pertenece a un namespace
use HireMe\Entities\Category;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
    /**
     * Creamos nuestras categorías manualmente
     * objetos
     */

    Category::create([
      'id' => '1',
      'name' => 'Backend developers',
      'slug' => 'backend-developers'
    ]);

    Category::create([
      'id' => '2',
      'name' => 'Frontend developers',
      'slug' => 'frontend-developers'
    ]);

    Category::create([

      'id' => '3',
      'name' => 'Designers',
      'slug' => 'designers'
    ]);

	}

}

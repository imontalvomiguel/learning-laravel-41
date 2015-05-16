<?php
// Para utilizar este componente necesitamos instalarlo. (composer)
// Este paquete es universal de php disponible en composer
// Facker nos ayuda a crear datos ficticios
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker; // Sobrenombre para faker en nuestra app

use HireMe\Entities\User;
use HireMe\Entities\Candidate;

class CandidateTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 80) as $index)
		{
      // Crear un usuario (instancia de User)
      $fullName = $faker->name;

      $user = User::create([
        'full_name' => $fullName,
        'email' => $faker->email,
        'password' => \Hash::make(123456), // Siempre en cualquier app cualquier framework se deben encriptar las contraseñas.
        'type' => 'candidate'
      ]);

      // Creamos un candidato(perfil)
			Candidate::create([
        'id' => $user->id,
        'website_url' => $faker->url,
        'description' => $faker->text(200),
        'job_type' => $faker->randomElement(['full', 'partial', 'freelance']),
        'category_id' => $faker->randomElement([1, 2, 3]),
        'available' => true,
        'slug' => \Str::slug($fullName)
			]);
		}
	}

}

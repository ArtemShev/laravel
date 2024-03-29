<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('news')->insert($this->getData());
	}
	private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i=0; $i < 4; $i++) {
			$data[] = [
				'category_id' => $i+1,
				'title'  => $faker->jobTitle(),
				'status' => 'ACTIVE',
				'author' => $faker->userName(),
				'image'  => $faker->imageUrl(),
				'description' =>  $faker->text(100)
			];
		}

		return $data;
	}

}
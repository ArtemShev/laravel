<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function getNews( ?string $category = null,?int $id = null ): array
	{
		$faker = Factory::create();
		$statusList = ["DRAFT", "ACTIVE", "BLOCKED"];
		$categoriesList = ["Politic","Animal","City"];
		if($category && $id) {
			return [
				'id'     => $id,
				'title'  => $faker->jobTitle(),
				'author' => $faker->userName(),
				'category_name' => $category,
				'image'  => $faker->imageUrl(250, 170),
				'status' => $statusList[mt_rand(0,2)],
				'description' => $faker->text(100)
			];
		}
		if($category){
			$data = [];
			for($i=0; $i < 10; $i++) {
				$id = $i+1;
				$data[] = [
					'id'     => $id,
					'title'  => $faker->jobTitle(),
					'author' => $faker->userName(),
					'category_name' => $category,
					'image'  => $faker->imageUrl(250, 170),
					'status' => $statusList[mt_rand(0,2)],
					'description' => $faker->text(100)
				];
			}

			return $data;
			}
		$data = [];
		for($i=0; $i < 10; $i++) {
			$id = $i+1;
			$data[] = [
				'id'     => $id,
				'title'  => $faker->jobTitle(),
				'author' => $faker->userName(),
				'category' => $categoriesList[mt_rand(0,2)],
				'image'  => $faker->imageUrl(250, 170),
				'status' => $statusList[mt_rand(0,2)],
				'description' => $faker->text(100)
			];
		}

		return $data;
	}

	public function getCategories():array
	{
		$categoriesList = ["Politic","Animal","City"];
		// $categoryData = [];
		// foreach($categoriesList as $category){
		// 	$categoryData[]= [
		// 		'category_name' => $category
		// 	];
		return $categoriesList;
		// }

	}
}
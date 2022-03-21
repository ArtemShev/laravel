<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoriesList()
	{
		$categories = $this->getCategories();
		return view('news.CategoriesList', [
			'categoriesList' => $categories,
		]
    );
	}
}

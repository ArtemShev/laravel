<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoriesList()
	{
		$categories = app(Category::class);
		return view('news.CategoriesList',[
			'categoriesList' => $categories->getCategories()
		]);
	}
}

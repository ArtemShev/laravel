<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;


class NewsController extends Controller
{
	public function index($category_name)
	{

		$news = app(News::class);
		// $categories = app(Category::class);
		// dd($categories->getCategoryByTitle($category_name));
		// dd($category_name);
		// dd($news->getNewsByCategory($category_name));
		return view('news.index', [
			'newsList' => $news->getNewsByCategory($category_name)
		]);
	}

	public function show($id,$category_name)
	{
		$news = app(News::class);


		return view('news.show', [
			'news' => $news->getNewsByIdAndCategory($id,$category_name)
		]);
	}

	public function store(Request $request)

	{
	;
	$request->validate([
		'name'=>['required','string']
	]);
	// $review=response()->json($request->only('name','email','description'));
	// $reviewArr= json_decode(json_encode($review));
	// var_dump(response()->json($request->only('name','email','description')));
	return response()->json($request->only('name','email','description'));
	// DB::table('users')
	// ->updateOrInsert(
	// ['email' => 'john@example.com', 'name' => 'John'],
	// ['votes' => '2']);
	}

	public function __invoke()
	{
		return view('news.subResponse');
	}

}

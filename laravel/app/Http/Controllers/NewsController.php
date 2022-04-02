<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;


class NewsController extends Controller
{
    public function index($category_name)
	{
		// $news =

		return view('news.index', [
			'newsList' => $this->getNews($category_name)
		]);
	}

	public function show($category_name,$id)
	{
		return view('news.show', [
			'news' => $this->getNews($category_name,$id)
		]);
	}

	public function store(Request $request)

	{
		$request->validate([
			'name'=>['required','string']
		]);
		return response()->json($request->only('name','email','description'),201);
	}

	public function __invoke()
	{
		return view('news.subResponse');
	}

}

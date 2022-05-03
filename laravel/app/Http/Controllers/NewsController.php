<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;


class NewsController extends Controller
{
    public function index()
	{
		return view('news.index', [
			'newsList' => News::paginate(10)
		]);
	}

	public function show(News $news)
	{
		return view('news.show', [
			'news' => $news
		]);
	}

}

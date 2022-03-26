<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Idn;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\ParsedNews;
use Illuminate\Http\Request;

class ParseNewsController extends Controller
{
    public function index()
	{
		return view('parsedNews.index', [
			'parsedNewsList' => ParsedNews::paginate(10)
		]);
	}

	public function show(ParsedNews $parsedNews)
	{
		return view('parsedNews.show', [
			'parsedNews' => $parsedNews
		]);
	}

}

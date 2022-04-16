<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;


class NewsController extends Controller
{
	public function index($category_id)
	{

		return view('news.index', [
			'newsList' => News::query()->where('category_id','=',$category_id)->get()
		]);
	}

	public function show($category_id,$id)
	{


		return view('news.show', [
			'news' => News::query()->where([['id','=',$id],['category_id','=',$category_id]])->get()
		]);
	}

}

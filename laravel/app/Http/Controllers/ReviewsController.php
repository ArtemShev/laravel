<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['name','email', 'description']);
		$review = Review::create($data);
		if($review) {
			return redirect()->route('news.categories')
				->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись');

    }
}

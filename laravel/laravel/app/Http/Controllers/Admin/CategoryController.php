<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
			'categories' => Category::withCount('news')->paginate(5)
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
		$category = Category::create($request->validated());
		if($category) {
			return redirect()->route('admin.categories.index')
				->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
			'category' => $category
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Category $category)
    {

		$status = $category->fill($request->validated())->save();

        if($status) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $categories
     * @return JsonResponse
     */
    public function destroy( Category $categories)
    {
        try{
            $categories->delete();

            return response()->json(['status' => 'ok']);
       }catch (\Exception $e) {
           \Log::error("News wasn't delete");
           return response()->json(['status' => 'error'], 400);
       }
    }
}

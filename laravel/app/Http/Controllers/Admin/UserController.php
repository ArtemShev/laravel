<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\CreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            return view('admin.users.index', [
                'usersList' => User::select()->paginate(5)
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function create()
        {
            // return view('admin.news.create', [
            //     'categories' => Category::select("id", "title")->get()
            // ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  Request  $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function store(Request $request)
        {
            //
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
         * @param User $user
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function edit(User $user)
        {
            return view('admin.users.edit', [
                'user' => $user
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param EditRequest $request
         * @param User $user
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(EditRequest $request, User $user)
        {
            $status = $user->fill($request->validated());

            if($status) {
                return redirect()->route('admin.users.index')
                    ->with('success',  'Пользователь был обновлен');
            }

            return back()->with('error', 'Ошибка обновления');

        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  User $user
         * @return JsonResponse
         */
        public function destroy(User $user): JsonResponse
        {
            try{
                 $user->delete();

                 return response()->json(['status' => 'ok']);
            }catch (\Exception $e) {
                Log::error("News wasn't delete");
                return response()->json(['status' => 'error'], 400);
            }
        }
}

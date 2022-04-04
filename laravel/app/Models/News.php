<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "news";

    public function getNews()
    {
        return \DB::table($this->table)
            ->select("id","title","description")
            ->get()->toArray();
    }

    public function getNewsByIdAndCategory( string $category,int $id)
    {
        return \DB::table($this->table)
        ->find();
    }

    public function getNewsByCategory(string $category_id)
    {
        return \DB::table($this->table)
        ->where('category_id','=', $category_id)->get()->toArray();
    }
    public function getNewsById(int $id)
    {
        return \DB::table($this->table)
            ->find($id);
    }
}

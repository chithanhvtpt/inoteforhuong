<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    public function create(Request $request)
    {
        $data = $request->only("name");
        $category = Category::query()->create($data);
        return $category;
    }



}

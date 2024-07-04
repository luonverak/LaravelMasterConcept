<?php

namespace App\Http\Service\Category;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryService{
    public function addCategory(Request $request){
        try {
            $category = CategoryModel::create([
                
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
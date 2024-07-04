<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Http\Service\Category\CategoryService;

class CategoryController extends Controller
{

    private $categoryService;
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }
    public function addCategory(Request $request)
    {
        try {
            return $this->categoryService->addCategory($request);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

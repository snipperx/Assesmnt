<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        $categories = $this->categoryService->all();
        return view('category.index', compact('categories'));
    }


    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->create($request->validated());
        return response()->json([
            'message' => 'success'
        ]);
    }


    public function show(category $category)
    {
        //
    }


    public function edit(category $category)
    {
        //
    }


    public function update(CategoryRequest $request, Category $category)
    {
         $this->categoryService->update(
            $request->validated(),
            $category->id
        );

        return response()->json();
    }


    public function destroy(Category $category)
    {
        $this->categoryService->delete($category->id);
        return back();
    }
}

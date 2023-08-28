<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(
        ProductService  $productService,
        CategoryService $categoryService
    )
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        dd($this->productService->find(636));
//        return view('productd.index');
    }


    public function create(Request $request)
    {
        dd($request);
    }


    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function store(ProductRequest $request): JsonResponse
    {
        $this->productService->create($request->validated());
        return response()->json([
            'message' => 'success'
        ]);
    }


    public function show($slug)
    {
        $categories = $this->categoryService->all();
        $products = $this->productService->find($slug);
        return view('products.show', compact('products', 'categories', 'slug'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }


    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->update(
            $product->id,
            $request->validated()
        );

        return response()->json();
    }


    public function destroy($productId): \Illuminate\Http\RedirectResponse
    {
        $this->productService->delete($productId);
        return back();
    }
}

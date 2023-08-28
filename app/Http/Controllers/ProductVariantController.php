<?php

namespace App\Http\Controllers;

use App\Http\Requests\VarientRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Services\ProductService;
use App\Services\ProductVariantService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var ProductVariantService
     */
    private $variantService;

    public function __construct(
        ProductService        $productService,
        ProductVariantService $variantService
    )
    {
        $this->productService = $productService;
        $this->variantService = $variantService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VarientRequest $request
     * @return JsonResponse
     */
    public function store(VarientRequest $request): JsonResponse
    {
        $this->variantService->create($request->validated());
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $product = Product::getIdBySlug($id);
        $previous = ProductVariant::getPreviousId($product);
        $variants = $this->variantService->find($id);
        $products = $this->productService->all();
        return view('productVariant.show',
            compact('products', 'id', 'variants','previous'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VarientRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(VarientRequest $request, int $id): JsonResponse
    {
        $this->variantService->update($request->validated(), $id);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->variantService->delete($id);
        return back();
    }


}

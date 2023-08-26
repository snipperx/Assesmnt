<?php

namespace App\Services;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductVariantInterface;

class ProductService
{
    /**
     * @var ProductVariantInterface
     */
    protected $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->productRepository->createProduct($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->productRepository->updateProduct($id, $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->productRepository->getAllProducts();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->productRepository->getProductById($id);
    }

//


}

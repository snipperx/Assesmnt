<?php

namespace App\Services;

use App\Repositories\ProductVariantInterface;

class ProductVariantService
{


    /**
     * @var ProductVariantInterface
     */
    private $variantRepository;

    public function __construct(ProductVariantInterface $variantRepository)
    {
        $this->variantRepository = $variantRepository;
    }

    public function create(array $data)
    {
        return $this->variantRepository->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->variantRepository->update( $id , $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->variantRepository->delete($id);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->variantRepository->getAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->variantRepository->getById($id);
    }
}

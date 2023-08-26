<?php
namespace App\Repositories;

interface ProductVariantInterface
{
    public function getAll();
    public function getById($id);
    public function delete($id);
    public function create(array $data);
    public function update($id, array $data);
    public function getIdBySlug($slug);
}

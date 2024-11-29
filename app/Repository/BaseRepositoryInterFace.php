<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    // Add custom query methods here if needed.
}

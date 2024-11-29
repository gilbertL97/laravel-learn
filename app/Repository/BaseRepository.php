<?php

use App\Models\BaseModel;
use App\Repositories\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{

    protected $model;

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $record = $this->model->find($id);
        if ($record) {
            $record->update($data);
            return $record;
        }
        return false;
    }

    public function delete($id)
    {
        $record = $this->model->find($id);
        if ($record) {
            $record->delete();
            return true;
        }
        return false;
    }
    // Implement custom query methods here if needed.

    public function getwithoutFilter(array $pagination)
    {
        $query = $this->model->query();
        return $this->makePagination($query, $pagination);
    }

    protected function makePagination($query, string|array $pagination)
    {
        // if (is_string($pagination))
        // $pagination = json_decode($pagination, true);
        $currentPage = isset($pagination["page"]) ? $pagination["page"] : 1;
        $pageSize = isset($pagination["pageSize"]) ? $pagination["pageSize"] : $this->model->perPage;
        return $query->paginate($pageSize, ['*'], 'page', $currentPage);
    }
}
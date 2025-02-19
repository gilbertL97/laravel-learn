<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use PaginationDTO;

class BaseService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->all();
    }
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }
    public function delete(Model $model): bool
    {
        return $model->delete();
    }


    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function getRelation(string $relation)
    {
        return $this->model->with($relation)->get();
    }
    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }



    public function applyFilters(array $filters): Builder
    {
        $query = $this->model->query();

        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $query->where($key, $value);
            }
        }

        return $query;
    }
    protected function applyPagination(?PaginationDTO $paginationDTO = null)
    {
        $query = $this->model->query();
        if ($paginationDTO !== null)
            $pagination = $this->paginationQuery($query, $paginationDTO);
        // Si no se solicita paginación, devolver todos los resultados
        return $pagination;
    }


    public function applyFiltersWithPagination(array $filters, PaginationDTO $paginationDto)
    {
        $query = $this->model->query();

        $filter = $this->filterQuery($filters, $query);
        return $this->paginationQuery($filter, $paginationDto);
    }

    public function filterQuery(array $filters, Builder $query)
    {
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $query->where($key, $value);
            }
        }
        return $query;
    }

    public function paginationQuery(Builder $query, ?PaginationDTO $paginationDTO = null)
    {
        if ($paginationDTO !== null) {
            return $query->paginate(
                $paginationDTO->perPage,
                ['*'],
                'page',
                $paginationDTO->page
            );
        }
        return $query->get();
    }
}

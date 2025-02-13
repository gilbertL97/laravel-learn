<?php

namespace App\Services;

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

    /**
     * Obtener todos los registros con paginación.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }

    /**
     * Crear un nuevo registro.
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Actualizar un registro existente.
     *
     * @param Model $model
     * @param array $data
     * @return bool
     */
    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    /**
     * Eliminar un registro.
     *
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Buscar un registro por su ID.
     *
     * @param int $id
     * @return Model|null
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }


    /**
     * Aplicar filtros a la consulta.
     *
     * @param array $filters
     * @return Builder
     */
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

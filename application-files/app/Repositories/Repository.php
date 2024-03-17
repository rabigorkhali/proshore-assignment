<?php

namespace App\Repositories;

use App\Exceptions\Api\ApiGenericException;
use App\Exceptions\ResourceNotFoundException;
use App\Interfaces\OpenInterface;
use App\Traits\PermissionHelper;
use Config;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Repository implements OpenInterface
{
    /**
     * Stores the model used for service.
     * @var Eloquent object
     */

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    // get all data
    public function getAllData($data, $selectedColumns = [], $pagination = true)
    {
        $query = $this->query();
        if (count($selectedColumns) > 0) {
            $query->select($selectedColumns);
        }

        if (isset($data->keyword) && $data->keyword !== null) {
            $query->where('title', 'LIKE', '%' . $data->keyword . '%');
        }
        if ($pagination) {
            return $query->orderBy('id', 'DESC')->paginate(PAGINATE);
        } else {
            return $query->orderBy('id', 'DESC')->get();
        }
    }

    // find model by its identifier

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findByEmail($email)
    {
        $data = $this->model->where('email', $email)->first();
        if (!isset($data)) {
            throw new ModelNotFoundException;
        }

        return $data;
    }

    //store single record

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $update = $this->itemByIdentifier($id);
        $update->fill($data)->save();
        $update = $this->itemByIdentifier($id);

        return $update;
    }

    public function delete($data, $id)
    {
        $item = $this->itemByIdentifier($id);
        return $item->delete();
    }

    //Get intem by its identifier

    public function itemByIdentifier($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (\Exception $e) {
            return throw new ResourceNotFoundException($e->getMessage());
        }
    }

    public function indexPageData($request): array
    {
        return [
            'items' => $this->getAllData($request),
        ];
    }

    public function createPageData($request): array
    {
        return [];
    }

    public function editPageData($request, $id): array
    {
        return [
            'item' => $this->itemByIdentifier($id)
        ];
    }

    public function query()
    {
        return $this->model->query();
    }

    public function insert($data)
    {
        return $this->model->insert($data);
    }
}

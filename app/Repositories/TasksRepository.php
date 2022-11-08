<?php

namespace App\Repositories;

use App\Models\Tasks;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TasksRepository
{
    /**
     * @param Tasks $model
     */
    public function __construct(private string $model = Tasks::class)
    {
    }

    /**
     * @param array $criteria
     * @return Builder|Collection
     */
    public function getTasks(array $criteria = []): Builder | Collection
    {
        $queryBuilder = $this->model::query();
        empty($criteria['completed']) ? $queryBuilder->whereNotNull('completed_at') : null;

        return $queryBuilder->get();
    }
}

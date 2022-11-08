<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TasksRepository
{
    /**
     * @param string $model
     */
    public function __construct(private string $model = Task::class)
    {
    }

    /**
     * @param array $criteria
     * @return Builder|Collection
     */
    public function getTasks(array $criteria = []): Builder | Collection
    {
        $queryBuilder = $this->model::query();
        !empty($criteria['completed']) ? $queryBuilder->whereNotNull('completed_at') : null;

        return $queryBuilder->get();
    }

    /**
     * Delete the task and return its ID.
     *
     * @param int $taskId
     * @return int
     */
    public function deleteTask(int $taskId): int
    {
        $this->model::query()->where('id', $taskId)->delete();

        return $taskId;
    }

    /**
     * Update the task.
     *
     *
     * @param array $data
     * @return Task
     */
    public function update(array $data): Task
    {
        $task = $this->model::find($data['id']);

        if(!empty($data['content'])) {
            $task->content = $data['content'];
        }

        if (!empty($data['completed'])) {
            $task->completed_at = now();
        }

        $task->save();

        return $task;
    }
}

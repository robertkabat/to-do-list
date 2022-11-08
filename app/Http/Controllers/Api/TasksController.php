<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateTask;
use App\Http\Requests\DeleteTask;
use App\Http\Requests\UpdateTask;
use App\Http\Resources\TasksCollection;
use App\Repositories\TasksRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TasksController extends BaseController
{
    /**
     * @param TasksRepository $tasksRepository
     */
    public function __construct(private TasksRepository $tasksRepository)
    {
    }

    /**
     * Index all tasks (filter by completed if needed).
     *
     * @param Request $request
     * @return TasksCollection
     */
    public function index(Request $request)
    {
        return new TasksCollection($this->tasksRepository->getTasks($request->only('completed')));
    }

    /**
     * Crate a new task.
     *
     * @param CreateTask $request
     */
    public function create(CreateTask $request)
    {
        $this->tasksRepository->create($request->only('content'));
    }

    /**
     * Update existing task.
     *
     * @param UpdateTask $request
     */
    public function update(UpdateTask $request)
    {
        $this->tasksRepository->update($request->only('id', 'content', 'completed'));
    }

    /**
     * Delete existing task.
     *
     * @param DeleteTask $request
     * @return JsonResponse
     */
    public function delete(DeleteTask $request)
    {
        return response()->json(['data' => [ 'id' => $this->tasksRepository->deleteTask($request->id)]]);
    }
}

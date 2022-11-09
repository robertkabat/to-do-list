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
    public function index(Request $request): TasksCollection
    {
        return new TasksCollection($this->tasksRepository->getTasks($request->only('completed')));
    }

    /**
     * Crate a new task.
     *
     * @param CreateTask $request
     * @return JsonResponse
     */
    public function create(CreateTask $request): JsonResponse
    {
       $this->tasksRepository->create($request->only('content'));

       return response()->json([], 201);
    }

    /**
     * Update existing task.
     *
     * @param UpdateTask $request
     * @return JsonResponse
     */
    public function update(UpdateTask $request): JsonResponse
    {
        $this->tasksRepository->update($request->only('id', 'content', 'completed'));

        return response()->json([], 200);
    }

    /**
     * Delete existing task.
     *
     * @param DeleteTask $request
     * @return JsonResponse
     */
    public function delete(DeleteTask $request): JsonResponse
    {
        return response()->json(['data' => [ 'id' => $this->tasksRepository->deleteTask($request->id)]]);
    }
}

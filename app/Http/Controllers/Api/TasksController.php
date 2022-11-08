<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DeleteTask;
use App\Http\Requests\UpdateTask;
use App\Http\Resources\TasksCollection;
use App\Repositories\TasksRepository;
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

    public function update(UpdateTask $request)
    {
        $this->tasksRepository->update($request->only('id', 'content', 'completed'));
    }

    public function delete(DeleteTask $request)
    {
        return response()->json(['data' => [ 'id' => $this->tasksRepository->deleteTask($request->id)]]);
    }
}

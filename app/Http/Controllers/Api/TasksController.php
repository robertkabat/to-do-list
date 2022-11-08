<?php

namespace App\Http\Controllers\Api;

use App\Repositories\TasksRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
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
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json(['data' => $this->tasksRepository->getTasks($request->only('completed'))]);
    }
}

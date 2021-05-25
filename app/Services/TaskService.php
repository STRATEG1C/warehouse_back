<?php

namespace App\Services;

use App\Models\TaskAssignment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TaskService
{
    public function getTaskAssignmentsForUser(Request $request): Collection
    {
        return TaskAssignment::where([
            ['user_id', '=', $request->user()->id],
            ['finish_time', '=', null]
        ])->get();
    }

    public function getTaskAssignment(int $id): TaskAssignment
    {
        return TaskAssignment::find($id);
    }

    public function finishTaskAssignment(int $id): void
    {
        $taskAssignment = TaskAssignment::find($id);
        $taskAssignment->finish_time = date('Y-m-d H:i:s');
        $taskAssignment->save();
    }
}

<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserService
{
    public function getList(Request $request): Collection
    {
        $roleId = $request->get('role_id');

        $query = User::query();
        if ($roleId) {
            $query = $query->where('role_id', $roleId);
        }

        return $query->get();
    }
}

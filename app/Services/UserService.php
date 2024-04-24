<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getUserByRole($role)
    {
        $this->checkAccess($role);
        $currentUser = Auth::user();
        if ($currentUser->role->slug === 'admin') {
            $users = User::where('role_id', function ($query) use ($role) {
                $query->select('id')
                    ->from((new Role)->getTable())
                    ->where('slug', $role)
                    ->limit(1);
            })->get();
        }

        if ($currentUser->role->slug == 'teamlead') {
            $users = User::where('role_id', function ($query) use ($role) {
                $query->select('id')
                    ->from((new Role)->getTable())
                    ->where('slug', $role)
                    ->limit(1);
            })
                ->where('teamlead_id', $currentUser->id)
                ->get();
        }

        return response()->json(['users' => $users]);
    }

    protected function checkAccess($role)
    {
        $userRole = Auth::user()->role->slug;
        $roles = [
            'admin' => ['admin', 'teamlead', 'web'],
            'teamlead' => ['web']
        ];

        if (!in_array($role, $roles[$userRole])) {
            return response()->json(['error' => 'You are not authorized to access this page.'], 403);
        }
    }
}

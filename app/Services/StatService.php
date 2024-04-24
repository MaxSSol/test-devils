<?php

namespace App\Services;

use App\Models\Transit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatService
{
    public function getStat()
    {
        $currentUser = Auth::user();

        if ($currentUser->role->slug === 'admin') {
            return response()->json(['stats' => Transit::all()->paginate(100)]);
        }

        if ($currentUser->role->slug === 'teamlead') {
            return response()->json(['stats' => Transit::with('user')->whereIn('user_id', function ($query) use ($currentUser) {
                $query->select('id')->from((new User())->getTable())->where('teamlead_id', $currentUser->id);
            })->paginate(100)]);
        }

        return response()->json(['stats' => Transit::with('user')->where('user_id', $currentUser->id)->paginate(100)]);
    }
}

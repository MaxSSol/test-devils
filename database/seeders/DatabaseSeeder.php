<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Transit;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = Role::factory()->createMany(config('roles'));

        $rolesByKey = $roles->keyBy('slug');

        if ($rolesByKey->has('admin')) {
            User::factory()->count(3)->create([
                'role_id' => $rolesByKey->get('admin')->id,
                'teamlead_id' => null,
            ]);
        }

        if ($rolesByKey->has('teamlead')) {
            $teamleads = User::factory()->count(20)->create([
                'role_id' => $rolesByKey->get('teamlead')->id,
                'teamlead_id' => null,
            ]);
        }

        if ($rolesByKey->has('web') && $teamleads) {
            foreach ($teamleads as $teamlead) {
                $webs = User::factory()->count(50)->create([
                    'role_id' => $rolesByKey->get('web')->id,
                    'teamlead_id' => $teamlead->id,
                ]);

                foreach ($webs as $web) {
                    Transit::factory()->count(50)->create([
                        'user_id' => $web->id,
                    ]);
                }

            }
        }
    }
}

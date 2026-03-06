<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Gonzalo',
            'email' => 'tester@colegionocturnosalamanca.com',
            'password' => Hash::make('gP67M24e$')
        ]);
        /*User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123')
        ]);*/

        $this->call([
            SettingSeeder::class,
            PermissionSeeder::class,
            AssignAllPermissionsToAdminSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        $directeur = User::create([
            'name' => 'directeur',
            'email' => 'directeur@gmail.com',
            'password' => Hash::make('password')
        ]);

        $normal = User::create([
            'name' => 'normal',
            'email' => 'normal@gmail.com',
            'password' => Hash::make('password')
        ]);
        // Roles -> admin -> directeur -> normal
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'directeur']);
        Role::create(['name' => 'normal']);

        // assign admin role to a user
        $admin->assignRole('admin');
        $directeur->assignRole('directeur');
        $normal->assignRole('normal');
    }
}

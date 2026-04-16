<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@pizza.com')->first();
        if (!$adminUser) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@pizza.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]);
        }

        $staffUser = User::where('email', 'staff@pizza.com')->first();
        if (!$staffUser) {
            User::create([
                'name' => 'Nhân viên',
                'email' => 'staff@pizza.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
            ]);
        }

        $managerUser = User::where('email', 'manager@pizza.com')->first();
        if (!$managerUser) {
            User::create([
                'name' => 'Quản lý',
                'email' => 'manager@pizza.com',
                'password' => Hash::make('password'),
                'role' => 'manager',
            ]);
        }

        $warehouseUser = User::where('email', 'warehouse@pizza.com')->first();
        if (!$warehouseUser) {
            User::create([
                'name' => 'Kho',
                'email' => 'warehouse@pizza.com',
                'password' => Hash::make('password'),
                'role' => 'warehouse',
            ]);
        }
    }
}

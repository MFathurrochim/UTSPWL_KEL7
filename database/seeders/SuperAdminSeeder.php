<?php


namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


use Illuminate\Support\Facades\Hash;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Fathur Rochim',
            'email' => 'superadmin@roles.id',
            'password' => Hash::make('123456')
        ]);
        $superAdmin->assignRole('Super Admin');
        // Creating Admin User
        $admin = User::create([
            'name' => 'Vivi Erlina',
            'email' => 'admin@roles.id',
            'password' => Hash::make('123456')
        ]);
        $admin->assignRole('Admin');
        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'Nawrah Chyntia',
            'email' => 'operator@roles.id',
            'password' => Hash::make('123456')
        ]);
        $productManager->assignRole('Operator');
    }
}

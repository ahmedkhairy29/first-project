<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'ahmedkhairy@gmail.com'],
            [
                'name' => 'ahmed khairy',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}

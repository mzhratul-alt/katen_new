<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Hasnat";
        $user->email = "hasnat@gmail.com";
        $user->password = Hash::make('123456789');
        $user->save();
        User::factory()->count(1000)->create();
    }
}

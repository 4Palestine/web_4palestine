<?php

namespace Database\Seeders;

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
        $seeds = $this->__data();
        foreach ($seeds as $item) {
            User::create(collect($item)->toArray());
        }
    }
    public function __data(){
        return [
            [
                'name' => 'Mohammed' ,
                'email' => 'mohammed@gmail.com' ,
                'password' => Hash::make('123456789'),
                'is_active' => 1 ,
            ],
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder {
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
        User::updateOrCreate([
            'first_name' => 'Rishabh',
            'last_name' => 'Gupta',
            'username' => 'rishabhgupta',
            'password' => '$2y$10$PJZGEJqYwpCUdBygjK9TsenRs3vWnJJqf3dYcWOCMgRSu5PCV7pFG',
            'number_of_vehicles' => 5,
            'gender' => User::GENDER_MALE,
        ], [
            'email' => 'rishabhgupta@yopmail.com',
        ]);
    }
}

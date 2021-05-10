<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Exam;
use App\Models\Multiple_choice;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)
        ->has(
            (Exam::factory()->count(3))->has(Question::factory()->count(3)->has(Multiple_choice::factory()->count(3))))->create();
    }
}
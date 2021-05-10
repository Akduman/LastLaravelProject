<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name(),	
            'user_id' => User::factory(),
            'title'=> $this->faker->name(),		
            'text'=> $this->faker->name(),		
            'time'=> '60',	
            'publish'=> '1',		
        ];
    }
}

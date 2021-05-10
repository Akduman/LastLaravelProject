<?php

namespace Database\Factories;

use App\Models\Multiple_choice;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class Multiple_choiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Multiple_choice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question'	=>  $this->faker->name(),	
            'answer'	=>	$this->faker->name(),	
            'option_a'	=>  $this->faker->name(),		
            'option_b'	=>	$this->faker->name(),	
            'option_c'	=>	$this->faker->name(),	
            'option_d'	=>	$this->faker->name(),	
            'question_id'	=>	 Question::factory(),
        ];
    }
}

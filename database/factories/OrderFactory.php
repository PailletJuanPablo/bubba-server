<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'company_id' => $this->faker->word,
        'user_id' => $this->faker->word,
        'number' => $this->faker->word,
        'name' => $this->faker->word,
        'remit' => $this->faker->text,
        'dni' => $this->faker->text,
        'card' => $this->faker->text,
        'sign' => $this->faker->text,
        'dni_number' => $this->faker->word,
        'card_number' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}

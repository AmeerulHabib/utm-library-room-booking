<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory’s corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model’s default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->words(2, true) . ' Room',
            'location' => $this->faker->buildingNumber . ' ' . $this->faker->streetName,
            'capacity' => $this->faker->numberBetween(2, 50),
        ];
    }
}

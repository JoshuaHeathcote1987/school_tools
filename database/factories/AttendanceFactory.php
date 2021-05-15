<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;
Use \Carbon\Carbon;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id' => $this->faker->randomDigitNot(0),
            'student_id' => $this->faker->randomDigitNot(0),
            'day' => $this->faker->randomDigitNot(0),
            'month' => 'January',
            'year' => 2021,
        ];
    }
}

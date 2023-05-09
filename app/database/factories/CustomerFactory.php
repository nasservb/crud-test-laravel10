<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Domains\Customer\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CustomerFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var class-string<\Illuminate\Database\Eloquent\Model|TModel>
    */
    protected $model = Customer::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'bank_account_number'=>fake()->iban(),
            'date_of_birth'=> fake()->dateTimeBetween('1990-01-01', '2012-12-31')
                ->format('Y-m-d'),
        ];
    }

}

<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand_id'=>rand(1,5),
            'description'=>fake()->sentence(),
            'discount'=>rand(10,50),
            'name'=>fake()->name(),
            'slug'=>fake()->slug()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $cars = ["Toyota" => "GT86","toyota" => "Silica"];

        $man = ["Toyota", "BMW", "Porshe", "Mazda", "Lamborghini", "Ferrari"];

        $mod = ["GT86", "Yaris", "Testarossa", "Focus"];

        $year = ["1990", "1991", "1992", "1993", "1994", "1995", "1996", "1997", "1998", "1999", "2000",
                    "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010". "2011", "2012", "2013", "2014",
                    "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"];

        $img = ["audi_suv", "toyota_gt_white", "nissan_gtr_gray", "toyota_gt_blue",
         "toyota_gt_rear", "toyota_yaris", "toyota_yaris_blue", "toyota_yaris_white",
          "vauxhaul_corsa", "vauxhaul_corsa_blue", "jaguar_etype"];

        return [
            'manufacture' => $this->faker->randomElement($man),
            'model' => $this->faker->randomElement($mod),
            'year' => $this->faker->randomElement($year),
            'image_name' => $this->faker->randomElement($img)
        ];
    }
}

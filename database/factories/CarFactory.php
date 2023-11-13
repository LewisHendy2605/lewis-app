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

        $man = ["Toyota", "BMW", "Porshe"];

        $mod = ["GT86", "Yaris", "Testarossa"];

        $year = ["1990", "1991", "1992", "1993", "1994", "1995", "1996", "1997", "1998", "1999", "2000",
    "2001", "2002", "2003", "2004", "2005", "2006", "2007", "2008", "2009", "2010". "2011", "2012", "2013", "2014",
"2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"];

        return [
            //
            
            'manufacture' => $this->faker->randomElement($man),
            'model' => $this->faker->randomElement($mod),
            'year' => $this->faker->randomElement($year)
        ];
    }
}

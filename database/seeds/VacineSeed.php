<?php

use Illuminate\Database\Seeder;

class VacineSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Layer Vacvination', 'category_id' => 1, 'interval' => 'three', 'description' => 'Vaccine for Layers to be applied every 3 months', 'last_vacine_date' => '02/07/2017', 'next_vacine_date' => '02/10/2017',],
            ['id' => 2, 'name' => 'Birds Vacination', 'category_id' => 1, 'interval' => 'one', 'description' => 'Vaccine for all categories of birds to be applied every months', 'last_vacine_date' => '01/07/2017', 'next_vacine_date' => '01/08/2017',],

        ];

        foreach ($items as $item) {
            \App\Vacine::create($item);
        }
    }
}

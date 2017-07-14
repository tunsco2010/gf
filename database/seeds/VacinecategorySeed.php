<?php

use Illuminate\Database\Seeder;

class VacinecategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Layer Vacvination',],

        ];

        foreach ($items as $item) {
            \App\Vacinecategory::create($item);
        }
    }
}

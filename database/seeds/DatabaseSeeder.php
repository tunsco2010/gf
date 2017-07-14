<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //Model::truncate();

        $this->call(UsersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(FaqCategorySeed::class);
        $this->call(FaqQuestionSeed::class);
        $this->call(VacinecategorySeed::class);
        $this->call(VacineSeed::class);

        Model::reguard();
    }
}

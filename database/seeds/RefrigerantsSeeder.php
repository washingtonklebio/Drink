<?php

use Illuminate\Database\Seeder;

class RefrigerantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refrigerant')->insert([
            'mark' => 'Coca cola',
            'quantity' => 3,
            'amount' => 2.5,
            'type' => 1,
            'flavor' => 1,
            'liter' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('refrigerant')->insert([
            'mark' => 'Fanta',
            'quantity' => 10,
            'amount' => 3.25,
            'type' => 3,
            'flavor' => 2,
            'liter' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('refrigerant')->insert([
            'mark' => 'Sprite',
            'quantity' => 4,
            'amount' => 3.50,
            'type' => 3,
            'flavor' => 3,
            'liter' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Core\Modules\Book\Models\Book::create([
           'title' => 'ABC',
           'author' => 'DEF',
           'created_by' => 1
        ]);
    }
}

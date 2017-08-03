<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
    	$data = [
    		'Dubai',
    		'Abu Dhabi',
    		'Sharjah',
    		'Fujairah',
    		'Al Ain',
    		'Ras al-Khaimah',
            'aaaa'
    	];
        DB::table('cities')->delete();
        foreach($data as $d) {
            DB::table('cities')->insert([
                'name' => $d, 'slug' => str_slug($d)
            ]);
        }
    }
}

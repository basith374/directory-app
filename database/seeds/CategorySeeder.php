<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name' => 'Mobiles', 'extra_class' => 'fa-mobile', 'image' => 'b12.png', 'sub' => [
        		'Mobile Phones', 'Tablets', 'Accessories'
        	]],
        	['name' => 'Electronics & Appliances', 'extra_class' => 'fa-laptop', 'image' => 'cat2.png', 'sub' => [
        		'Computers & Accessories', 'TV - Video - Audio', 'Cameras & Accessories', 'Games & Entertainment', 'Fridge - AC - Washing Machine', 'Kitchen & Other Appliances'
        	]],
        	['name' => 'Cars', 'extra_class' => 'fa-car', 'image' => 'cat3.png', 'sub' => [
        		'Commercial Vehicles', 'Other Vehicles', 'Spare Parts'
        	]],
        	['name' => 'Bikes', 'extra_class' => 'fa-motorcycle', 'image' => 'cat4.png', 'sub' => [
        		'Motorcycles', 'Bicycles', 'Scooters', 'Spare Parts'
        	]],
        	['name' => 'Furnitures', 'extra_class' => 'fa-wheelchair', 'image' => 'cat5.png', 'sub' => [
        		'Sofa & Dining', 'Beds & Wardrobes', 'Home Decor & Garden', 'Other Household Items'
        	]],
        	['name' => 'Pets', 'extra_class' => 'fa-paw', 'image' => 'cat6.png', 'sub' => [
        		'Dogs', 'Aquariums', 'Pet Food & Accessories', 'Other Pets'
        	]],
        	['name' => 'Books, Sports & Hobbies', 'extra_class' => 'fa-book', 'image' => 'cat7.png', 'sub' => [
        		'Books & Magazines', 'Musical Instruments', 'Sports Equipment', 'Gym & Fitness', 'Other Hobbies'
        	]],
        	['name' => 'Fashion', 'extra_class' => 'fa-asterisk', 'image' => 'cat8.png', 'sub' => [
        		'Clothes', 'Footwear', 'Accessories'
        	]],
        	['name' => 'Kids', 'extra_class' => 'fa-gamepad', 'image' => 'cat9.png', 'sub' => [
        		'Furniture And Toys', 'Prams & Walkers', 'Accessories'
        	]],
        	['name' => 'Services', 'extra_class' => 'fa-shield', 'image' => 'cat10.png', 'sub' => [
        		'Education & Classes', 'Web Development', 'Electronics & Computer Repair', 'Maids & Domestic Help', 'Health & Beauty', 'Movers & Packers', 'Drivers & Taxi', 'Event Services', 'Other Services'
        	]],
        	['name' => 'Jobs', 'extra_class' => 'fa-at', 'image' => 'cat11.png', 'sub' => [
        		'Customer Service', 'IT', 'Online', 'Marketing', 'Advertising & PR', 'Sales', 'Clerical & Administration', 'Human Resources', 'Education', 'Hotels & Tourism', 'Accounting & Finance', 'Manufacturing', 'Part - Time', 'Other Jobs'
        	]],
        	['name' => 'Real Estate', 'extra_class' => 'fa-home', 'image' => 'cat12.png', 'sub' => [
        		'Houses', 'Apartments', 'PG & Roommates', 'Land & Plots', 'Shops - Offices - Commercial Space', 'Vacation Rentals - Guest Houses'
        	]],
        ];

        $upload_dir = '/uploads/';
        if(!File::exists(public_path() . $upload_dir))
        	File::makeDirectory(public_path() . $upload_dir);
        else
        	File::deleteDirectory(public_path() . $upload_dir, true); // recursive
        DB::table('categories')->delete();
        foreach($data as $_d) {
        	$d = $_d;
        	unset($d['sub']);
            $filename = $upload_dir . uniqid() . '.png';
            File::copy(public_path() . '/images/' . $d['image'], public_path() . $filename);
            $d['image'] = $filename;
        	$d['slug'] = str_slug($d['name']);

        	$id = DB::table('categories')->insertGetId($d);
        	foreach($_d['sub'] as $sub) {
        		DB::table('categories')->insert(['name' => $sub, 'parent_id' => $id, 'slug' => str_slug($sub)]);
        	}
        }
    }
}

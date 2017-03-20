<?php

use Illuminate\Database\Seeder;

class ClassifiedSeeder extends Seeder
{
    public function run()
    {
    	DB::table('classifieds')->delete();
    	$cities = DB::table('cities')->pluck('id')->all();
    	$categories = DB::table('categories')->pluck('id', 'slug')->all();
    	$data = [
    		'mobiles' => [
	    		['name' => 'Samsung Core', 'image' => 'p1.jpg'],
	    		['name' => 'Moto G', 'image' => 'p2.jpg'],
	    		['name' => 'Nokia H7', 'image' => 'p3.jpg'],
	    		['name' => 'Blackberry P4', 'image' => 'p4.jpg'],
	    		['name' => 'Lenovo Z9', 'image' => 'p9.jpg'],
	    		['name' => 'IPhone 5', 'image' => 'p10.jpg'],
	    		['name' => 'Samsung C4', 'image' => 'p11.jpg'],
	    		['name' => 'AT&T', 'image' => 'p12.jpg'],

	    		['name' => 'Samsung', 'image' => 'm1.jpg'],
	    		['name' => 'Techno Phone', 'image' => 'm2.jpg'],
	    		['name' => 'SONY', 'image' => 'm3.jpg'],
	    		['name' => 'Lenovo', 'image' => 'm4.jpg'],
	    		['name' => 'HTC', 'image' => 'm5.jpg'],
	    		['name' => 'Nexus', 'image' => 'm6.jpg'],
	    		['name' => 'SONY FOO', 'image' => 'm7.jpg'],
	    		['name' => 'Samsung Galaxy', 'image' => 'm11.jpg'],
	    		['name' => 'IPhone 4G', 'image' => 'm12.jpg'],
    		],

    		'cars' => [
	    		['name' => 'Mazda RX135', 'image' => 'p5.jpg'],
	    		['name' => 'Nissan Patrol', 'image' => 'p6.jpg'],
				['name' => 'Volvo G69', 'image' => 'p7.jpg'],
	    		['name' => 'Audi Q3', 'image' => 'p8.jpg'],
	    		['name' => 'Porsche Carrera', 'image' => 'c1.jpg'],
	    		['name' => 'Porsche Panamera', 'image' => 'c2.jpg'],
	    		['name' => 'Toyota Landcruiser', 'image' => 'c3.jpg'],
	    		['name' => 'VolksWagen SUV', 'image' => 'c4.jpg'],
	    		['name' => 'VolksWagen Polo', 'image' => 'c5.jpg'],
	    		['name' => 'BMW M3', 'image' => 'c6.jpg'],
	    		['name' => 'BMW R3', 'image' => 'c7.jpg'],
	    		['name' => 'Audi A6', 'image' => 'c8.jpg'],
	    		['name' => 'Audi A4', 'image' => 'c9.jpg'],
	    		['name' => 'Toyota Corolla', 'image' => 'c10.jpg'],
	    		['name' => 'Audi Q7', 'image' => 'c11.jpg'],
	    		['name' => 'Armageddon', 'image' => 'c12.jpg'],
	    		['name' => 'Honda BRV', 'image' => 'c13.jpg'],
    		],

    		'electronics-appliances' => [
	    		['name' => 'Desktop', 'image' => 'e1.jpg'],
	    		['name' => 'Canon Camera', 'image' => 'e2.jpg'],
	    		['name' => 'Sony Headphones', 'image' => 'e3.jpg'],
	    		['name' => 'Desktop', 'image' => 'e4.jpg'],
	    		['name' => 'Windows PC', 'image' => 'e5.jpg'],
	    		['name' => 'Nikon SLR', 'image' => 'e6.jpg'],
	    		['name' => 'Topyo Camera', 'image' => 'e7.jpg'],
	    		['name' => 'Pinky', 'image' => 'e8.jpg'],
	    		['name' => 'Desktop', 'image' => 'e9.jpg'],
	    		['name' => 'PC', 'image' => 'e10.jpg'],
	    		['name' => 'ADATA FLASH', 'image' => 'e11.jpg'],
	    		['name' => 'Refrigerator', 'image' => 'e12.jpg'],
	    		['name' => 'Printer', 'image' => 'e13.jpg']
    		],

    		'bikes' => [
	    		['name' => 'HD 123', 'image' => 'bk1.jpg'],
	    		['name' => 'Harley Davidson', 'image' => 'bk2.jpg'],
	    		['name' => 'Helmet', 'image' => 'bk3.jpg'],
	    		['name' => 'Pulsar', 'image' => 'bk4.jpg'],
	    		['name' => 'Moto', 'image' => 'bk5.jpg'],
	    		['name' => 'Ninja', 'image' => 'bk6.jpg'],
	    		['name' => 'Helmet', 'image' => 'bk7.jpg'],
	    		['name' => 'CT 100', 'image' => 'bk8.jpg'],
	    		['name' => 'CBR 2000', 'image' => 'bk9.jpg'],
	    		['name' => 'Hornet', 'image' => 'bk10.jpg'],
	    		['name' => 'Foozie', 'image' => 'bk11.jpg'],
	    		['name' => 'Haya', 'image' => 'bk12.jpg'],
	    		['name' => 'MAHAYA', 'image' => 'bk13.jpg'],
    		],

    		'furnitures' => [
	    		['name' => 'Sofa', 'image' => 'fr1.jpg'],
	    		['name' => 'Red Sofa', 'image' => 'fr2.jpg'],
	    		['name' => 'Table', 'image' => 'fr3.jpg'],
	    		['name' => 'Futons', 'image' => 'fr4.jpg'],
	    		['name' => 'Chairs', 'image' => 'fr5.jpg'],
	    		['name' => 'Chair', 'image' => 'fr6.jpg'],
	    		['name' => 'Chair', 'image' => 'fr7.jpg'],
	    		['name' => 'Sofa', 'image' => 'fr8.jpg'],
	    		['name' => 'Chairs', 'image' => 'fr9.jpg'],
	    		['name' => 'Sofa Chair', 'image' => 'fr10.jpg'],
	    		['name' => 'Stools', 'image' => 'fr11.jpg'],
	    		['name' => 'Lean Sofa', 'image' => 'fr12.jpg'],
	    		['name' => 'Smooth Sofa', 'image' => 'fr13.jpg']
    		],

    		'pets' => [
	    		['name' => 'Shitzu', 'image' => 'd1.jpg'],
	    		['name' => 'Pup', 'image' => 'd2.jpg'],
	    		['name' => 'Shitzu 2', 'image' => 'd3.jpg'],
	    		['name' => 'Pup 2', 'image' => 'd4.jpg'],
	    		['name' => 'German Sheperd', 'image' => 'd5.jpg'],
	    		['name' => 'Doggy', 'image' => 'd6.jpg'],
	    		['name' => 'Pupster', 'image' => 'd7.jpg'],
	    		['name' => 'Dog', 'image' => 'd8.jpg'],
	    		['name' => 'Two Pups', 'image' => 'd9.jpg'],
	    		['name' => 'Bearded', 'image' => 'd10.jpg'],
	    		['name' => 'Many Pups', 'image' => 'd11.jpg'],
	    		['name' => 'Meganodor', 'image' => 'd12.jpg'],
	    		['name' => 'Dalmation', 'image' => 'd13.jpg'],
    		],

    		'books-sports-hobbies' => [
	    		['name' => 'Handicrafts', 'image' => 'b1.jpg'],
	    		['name' => 'Bowling Team', 'image' => 'b2.jpg'],
	    		['name' => 'Pins', 'image' => 'b3.jpg'],
	    		['name' => 'Reading', 'image' => 'b4.jpg'],
	    		['name' => 'Books', 'image' => 'b5.jpg'],
	    		['name' => 'Baseballs', 'image' => 'b6.jpg'],
	    		['name' => 'Healthcare', 'image' => 'b7.jpg'],
	    		['name' => 'Sports', 'image' => 'b8.jpg'],
	    		['name' => 'Badminton Bat', 'image' => 'b9.jpg'],
	    		['name' => 'Books 2', 'image' => 'b10.jpg'],
	    		['name' => 'Photography', 'image' => 'b11.jpg'],
	    		['name' => 'Books 3', 'image' => 'b12.jpg'],
	    		['name' => 'Books 4', 'image' => 'b13.jpg'],
    		],

    		'fashion' => [
	    		['name' => 'Suits', 'image' => 'fa1.jpg'],
	    		['name' => 'Shoes', 'image' => 'fa2.jpg'],
	    		['name' => 'Jeans', 'image' => 'fa3.jpg'],
	    		['name' => 'Woodland Shoes', 'image' => 'fa4.jpg'],
	    		['name' => 'Patched Jeans', 'image' => 'fa5.jpg'],
	    		['name' => 'Party Shirt', 'image' => 'fa6.jpg'],
	    		['name' => 'Thermo Gloves', 'image' => 'fa7.jpg'],
	    		['name' => 'Nice Shirt', 'image' => 'fa8.jpg'],
	    		['name' => 'Cap', 'image' => 'fa9.jpg'],
	    		['name' => 'T-Shirt', 'image' => 'fa10.jpg'],
	    		['name' => 'Ninjistu', 'image' => 'fa11.jpg'],
	    		['name' => 'Exe', 'image' => 'fa12.jpg'],
	    		['name' => 'Boots', 'image' => 'fa13.jpg'],
    		],

    		'kids' => [
	    		['name' => 'Pony', 'image' => 'k1.jpg'],
	    		['name' => 'Rolls Royce', 'image' => 'k2.jpg'],
	    		['name' => 'Elephant', 'image' => 'k3.jpg'],
	    		['name' => 'Donkey', 'image' => 'k4.jpg'],
	    		['name' => 'Palatone', 'image' => 'k5.jpg'],
	    		['name' => 'Play Doh', 'image' => 'k6.jpg'],
	    		['name' => 'Teddy', 'image' => 'k7.jpg'],
	    		['name' => 'Cart', 'image' => 'k8.jpg'],
	    		['name' => 'Ducky', 'image' => 'k9.jpg'],
	    		['name' => 'Dino', 'image' => 'k10.jpg'],
	    		['name' => 'Darts', 'image' => 'k11.jpg'],
	    		['name' => 'Teddy Pack', 'image' => 'k12.jpg'],
	    		['name' => 'Pony', 'image' => 'k13.jpg'],
    		],

    		'services' => [
	    		['name' => 'Software Development'],
	    		['name' => 'Plumbing'],
	    		['name' => 'Electrical Works']
    		],

    		'jobs' => [
    			['name' => 'Delivery Boy'],
    			['name' => 'Office Admin'],
    			['name' => 'Web Developer'],
    			['name' => 'Coconut Tree Climber'],
    		],

    		'real-estate' => [
	    		['name' => 'House', 'image' => 'r1.jpg'],
	    		['name' => 'Home', 'image' => 'r2.jpg'],
	    		['name' => 'Villa', 'image' => 'r3.jpg'],
	    		['name' => 'Apartment', 'image' => 'r4.jpg'],
	    		['name' => 'Land', 'image' => 'r5.jpg'],
	    		['name' => 'Plot', 'image' => 'r6.jpg'],
	    		['name' => 'For Sale', 'image' => 'r7.jpg'],
	    		['name' => 'Space', 'image' => 'r8.jpg'],
	    		['name' => 'Rent', 'image' => 'r9.jpg'],
	    		['name' => 'To Let', 'image' => 'r10.jpg'],
	    		['name' => 'Place', 'image' => 'r11.jpg'],
	    		['name' => 'Address', 'image' => 'r12.jpg'],
	    		['name' => 'Estate', 'image' => 'r13.jpg'],
    		]
    	];

        $upload_dir = '/uploads/';
		$faker = Faker\Factory::create();
    	foreach($data as $cat => $items) {
    		foreach($items as $item) {
    			$item['category_id'] = $categories[$cat];
    			$item['price'] = rand(1, 1000);
    			$item['owner'] = $faker->name;
    			$item['mobile'] = $faker->phoneNumber;
    			$item['email'] = $faker->email;
    			$item['description'] = $faker->text(200);
    			$item['city_id'] = $cities[array_rand($cities)];
    			$item['approved'] = 1;
    			$img = isset($item['image']) ? $item['image'] : null;
    			unset($item['image']);
	    		$classified = \App\Classified::create($item);
    			if($img) {
		            $filename = $upload_dir . uniqid() . '.png';
		            File::copy(public_path() . '/images/' . $img, public_path() . $filename);
	    			$image = ['image' => $filename];
		            $classified->images()->create($image);
	    		}
    		}
    	}
    }
}

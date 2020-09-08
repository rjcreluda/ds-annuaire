<?php

use Illuminate\Database\Seeder;

use App\Profile;
use App\User;
use App\Listing;
use App\Photo;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Admin user
    	$admin = User::create([
    		'name' => 'Admin',
            'email' => 'jindessi.rabe@gmail.com',
            'password' => bcrypt('password'),
            'is_admin'	=> 1
    	]);
    	Profile::create([
    		'user_id' => $admin->id,
            'phone' => '',
            'facebook' => ''
        ]);
        Listing::create([
            'user_id' => $admin->id
        ]);
        
        //Default Single User
        $user = User::create([
    		'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'is_admin'	=> 0
    	]);
    	Profile::create([
    		'user_id' => $user->id,
            'phone' => '',
            'facebook' => ''
        ]);
        Listing::create([
            'user_id' => $user->id,
            'category_id' => 1,
            'name' => 'JDoe LTD',
            'slug' => str_slug('JDoe LTD')
        ]);

        //factory('App\User', 30)->create();


        /* GENERATING DUMMY DATAS */

        $faker = Faker\Factory::create();
        
        for( $i = 0; $i < 300; $i++ ){
            // Registering dummy user
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'is_admin'	=> 0
            ]);
            // Regstering profile for user
            Profile::create([
                'user_id' => $user->id,
                'phone' => $faker->phoneNumber,
                'facebook' => 'https://facebook.com/' . str_slug($user->name),
            ]);
            // Registering dummy listing for the user
            $company = $faker->company;
            $listing = Listing::create([
                'user_id' => $user->id,
                'category_id' => App\Category::inRandomOrder()->first()->id, 
                'name' => $company,
                'slug' => str_slug($company),
                'description' => $faker->text(200),
                'address' => $faker->address,
                'email' => $faker->companyEmail,
                'website' => $faker->domainName,
                'phone' => $faker->phoneNumber,
                'status' => $faker->numberBetween(0,1)
            ]);
            // Adding default photo for the listing
            Photo::create([
                'listing_id'    => $listing->id,
                'url'           => 'listing-thumbnail.png'
            ]);
        }

    }
}

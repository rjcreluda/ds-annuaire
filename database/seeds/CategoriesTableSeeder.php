<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$default_cats = [
    		'Par defaut', 'Restaurations', 'Hotels', 'Administrations', 'Tourisme', 'Commerces',
    		'Associations', 'Transports', 'Services', 'Tours opérateurs', 'Finances', 'Sports', 'Agence Immobilier'
    	];

    	foreach($default_cats as $cat){
    		Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat)
            ]);
    	}
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Listing;
use App\Category;

class FrontendController extends Controller
{
	public function index() {
		$categories = Category::where('id', '!=', 1)->get();
		$listings = Listing::orderBy('created_at', 'desc')->take(6)->get();
		return view('index')->with('categories', $categories)->with('listings', $listings);
	} 

    public function profile() {
    	$userid = auth()->user()->id;
		$user = User::find($userid);
		$listing = Listing::where('user_id', $userid)->get()->first();
		$cats = Category::all();
		return view('profile')
					->with('user', $user)
					->with('listing', $listing)->with('categories', $cats);
	}
	
	public function category($slug){
		$category = Category::where('slug', $slug)->first();
		$listings = Listing::where('category_id', $category->id)->paginate(12);
		return view('category.single')->with('listings', $listings)
									->with('category', $category->name);

	}

	public function listing($category_slug, $id){

	}
}

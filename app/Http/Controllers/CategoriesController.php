<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use App\Listing;
use Session;

class CategoriesController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['except' => ['index', 'show'] ]);
        $this->categories = Category::orderBy('name', 'asc')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.listings.category')->with('categories', $this->categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:4|max:30'
        ]);

        $cat = new Category;
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->save();
        Session::flash('success', 'Categorie enregistrée');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Getting all listings belongs to the category
        $listings = Category::where('slug', $slug)->first()->listings;
        $count = Listing::count();
        return view('admin.listings.index')->with('listings', $listings)
                ->with('categories', $this->categories)
                ->with('slug', $slug)
                ->with('listing_count', $count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        Session::flash('success', 'Les modifications ont été enregistrée');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        Session::flash('info', 'Categorie supprimée');
        return redirect()->back();
    }
}

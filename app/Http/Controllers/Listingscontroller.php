<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Listing;
use App\Photo;
use App\Category;

class Listingscontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('admin', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Getting Listing List
        if( auth()->check() && auth()->user()->is_admin ){
            $listings = Listing::where('user_id', '!=', 1)->paginate(20);
            $cats = Category::all();
            $count = Listing::count();
            return view('admin.listings.index')->with('listings', $listings)
                        ->with('categories', $cats)
                        ->with('listing_count', $count);
        }

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
        $this->validate($request, [
            'category_id'   => 'required',
            'name'          => 'required',
            'description'   => 'required',
            'address'       => 'required',
            'phone'         => 'required'
        ]);
        $user_id = auth()->user()->id;

        // Checking if user already has a listing
        $listing = Listing::where('user_id', $user_id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate( $request, [
            'listing_category'      => 'required',
            'listing_name'          => 'required',
            'listing_description'   => 'required',
            'listing_address'       => 'required',
            'listing_phone'         => 'required'
        ] );
        $user_id = auth()->user()->id;
        $listing = Listing::find($id);
        $listing->category_id = $request->listing_category;
        $listing->name = $request->listing_name;
        $listing->slug = str_slug($request->listing_name);
        $listing->description = $request->listing_description;
        $listing->address = $request->listing_address;
        $listing->phone = $request->listing_phone;

        if( $request->listing_website ){
            $listing->website = $request->listing_website;
        }
        if( $request->listing_email ){
            $listing->email = $request->listing_email;
        }

        $listing->save();

        // Uploading image
        if( $file = $request->file('image_uploads') ){
            $destination_path = public_path('/uploads');
            foreach( $file as $img ){
                $filename = str_slug($listing->name);
                $img_name = $filename . '-' . time() . '.' . $img->getClientOriginalExtension();
                $img->move( $destination_path, $img_name );
                // Save photo name to database
                $photo = new Photo;
                $photo->listing_id = $listing->id;
                $photo->url = $img_name;
                $photo->save();
            }
        }

        Session::flash('success', 'Modifications enregistrées avec success');
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
        //
    }
}

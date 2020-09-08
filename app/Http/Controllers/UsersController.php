<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\User;
use App\Profile;
use App\Listing;
use Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['store', 'edit', 'update', 'updatePassword']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::orderBy('created_at', 'desc')->paginate(20);
        $users_count = User::count();
        return view('admin.users.index')->with('users', $users)->with('users_count', $users_count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'      => 'required|min:4',
            'email'     => 'required|email',
            'password'  => 'required|confirmed|min:8'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        // Check if Admin add another admin
        if( auth()->check() ){
            if(  auth()->user()->is_admin && $request->is_admin ){
                $user->is_admin = 1;
            }
        }

        $user->save(); 

        // Creating default profile for user
        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->phone = $request->phone;
        $profile->facebook = $request->facebook;
        $profile->save();

        // Creating default Listing for user
        $listing = new Listing;
        $listing->user_id = $user->id;
        $listing->save();

        if( auth()->check() && auth()->user()->is_admin ){
            Session::flash('success', 'Utilisateur enregistrée');
            return redirect()->route('users.index');
        }
        else{
            return redirect('front.profile');
        }
        
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
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
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
            'name'      => 'required|min:4',
            'email'     => 'required|email'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if( $request->password ){
            $user->password = bcrypt($request->password);
        }
        
        if( auth()->user()->is_admin && $request->is_admin == 1){
            $user->is_admin = 1;
        }

        $user->save(); 

        $profile_id = $user->profile->id;

        $profile = Profile::find($profile_id);

        if( $request->phone ){ 
            $profile->phone = $request->phone;
        }
        if( $request->facebook ){
            $profile->facebook = $request->facebook;
        }
        $profile->save();   

        if( auth()->user()->is_admin ){
            Session::flash('success', 'Utilisateur modifiée');
            return redirect()->route('users.index');
        }
        else{
            return redirect()->route('front.profile');
        }
        
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'      => 'required',
            'password'     => 'required|confirmed|min:8'
        ]);

        $user = User::find(auth()->user()->id);

        //dd($user->name);

        if( Hash::check($request->old_password, $user->password) ){
            $newpass = Hash::make($request->password);
            $user->password = $newpass;
            $user->save();
            auth()->logout();
            return redirect()->route('connexion');
        }
        else{
            Session::flash('pass_error', 'Ancien mot de passe incorrecte');
            return redirect()->route('front.profile');
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('success', 'User deleted');
        return redirect()->back();
    }
}

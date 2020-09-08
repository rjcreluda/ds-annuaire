<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Photo;

class PhotosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function delete(Request $request){
        $this->validate($request, [
            'image_delete'  => 'required'
        ]);
        $photos_id = $request->input('image_delete');
        foreach($photos_id as $id){
            $photo = Photo::find($id);
            $filename = $photo->url;
            $photo->delete();
            // Removing photos from upload folder
            unlink( public_path() ."/uploads/". $filename );
        }
        return redirect()->back();
    }
}

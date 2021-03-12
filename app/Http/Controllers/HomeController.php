<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $images = DB::table('images')
        ->select('*')
        ->where('user_id', '=', $user->id)
        ->get();
        
        return view('home', [
            'images' => $images,
            'user' => $user
        ]);
    }

    public function home()
    {
        // get all the images from database
        // $images = DB::table('images')->get();

        // get all the images with the user who posted them
        $images = DB::table('images')
        ->join('users', 'images.user_id', '=', 'users.id')
        ->select('images.*', 'users.name as user_name', 'users.email as user_email')
        ->get();
        
        return view('welcome', [
            'images' => $images
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:10240',
        ]);

        $fileName = time().'.'.$request->image->extension(); // 123456789 + '.' + jpg/png/jpeg
        
        // move the upload file from tmp to storage folder
        $request->image->move(storage_path('app/public'), $fileName);
        $user = auth()->user();

        // insert the data into database
        DB::table('images')->insert([
            'user_id' => $user->id,
            'name' => $fileName,
            'created_at' => new \Datetime(), // curent timestamp,
            'updated_at' => new \Datetime()
        ]);

        return redirect()->back()->with('success', 'You have successfully uploaded an image.');
    }
}

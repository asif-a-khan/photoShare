<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = DB::table('cars')
        ->select('*')
        ->where('user_id', '=', auth()->user()->id)
        ->get();
        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    public function apiIndex() {
        $cars = DB::table('cars')->select('*')->get();
        return response()->json($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:10',
            'brand' => 'required|string|max:15',
            'price' => 'required|integer|max:30000'
        ]);

        $user = auth()->user();

        DB::table('cars')->insert([
            'name' => $request->name,
            'user_id' => $user->id,
            'brand' => $request->brand,
            'price' => $request->price
        ]);
        
        return redirect('/car');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = DB::table('cars')->where('id', '=', $id)->first();
        return view('cars.show', [
            'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = DB::table('cars')->where('id', '=', $id)->first();
        return view('cars.edit', [
            'car' => $car
        ]);
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
        $request->validate([
            'name' => 'required|string|max:10',
            'brand' => 'required|string|max:15',
            'price' => 'required|integer|max:30000'
        ]);

        DB::table('cars')->where('id', '=', $id)->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price
        ]);

        return redirect('/car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cars')->where('id', '=', $id)->delete();

        return redirect('/car');
    }
}

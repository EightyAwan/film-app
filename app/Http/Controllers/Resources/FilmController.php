<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use Validator;
use Exception;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $films = Film::get();
        if($request->ajax()){
            $response = [
                'message' => 'Film records',
                'data' => $films
            ];
            return response()->json($response,200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'description' => 'required', 
            'release_date' => 'required', 
            'rating' => 'required', 
            'ticket_price' => 'required|numeric|min:10|max:200', 
            'genre' => 'required', 
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
         
        if($validator->fails()){
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        try{
        $photo = '';
        if ($image = $request->file('photo')) {
            $destinationPath = 'assets/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $photo = $destinationPath.$profileImage;
        }

        // save film

        $film = new Film();
        $film->name = $request->name;
        $film->slug = $request->name;
        $film->description = $request->description;
        $film->release_date = $request->release_date;
        $film->rating = $request->rating;
        $film->ticket_price = $request->ticket_price;
        $film->genre = serialize($request->genre);
        $film->photo = $photo;
        $film->save(); 
        return redirect()->back()->with('success', 'Film has been added successfully.');

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong.');
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
        $film = Film::with('comments')
        ->where('slug',$id)
        ->first();
        return view('frontend.show',compact('film'));
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
        //
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

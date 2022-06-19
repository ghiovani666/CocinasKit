<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function update(Request $request, Profile $profile)
    {

        if($request->hasFile('image')) {
            $file = $request->file('image');
                $filename  = time() .'_'.$file->getClientOriginalName();
                $path = "img/profile";
                $file->move($path,$filename);

                $url_imagen =  DB::table('profiles')->where('id', '=',  $profile->id)->get();
                if($url_imagen[0]->image!=null){
                    unlink(str_replace('/img/', 'img/',  $url_imagen[0]->image));

                       DB::table('profiles')
                      ->where('id', $profile->id)
                      ->update([
                        'bio' => $request->bio,
                        'work' => $request->work,
                        'place_of_work' => $request->place_of_work,
                        'image' => '/img/profile/'.$filename
                    ]);

                }else{           
                       DB::table('profiles')
                      ->where('id', $profile->id)
                      ->update([
                        'bio' => $request->bio,
                        'work' => $request->work,
                        'place_of_work' => $request->place_of_work,
                        'image' => '/img/profile/'.$filename
                    ]);
                }
        }

        $profile->update([
            'bio' => $request->bio,
            'work' => $request->work,
            'place_of_work' => $request->place_of_work
        ]);

        return response()->json([
            'message' => 'Profile Updated Successfully',
        ]);
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
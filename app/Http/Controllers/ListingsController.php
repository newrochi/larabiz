<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListingsController extends Controller
{
    /**
     * ListingsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $listings=Listing::orderBy('created_at','desc')->get();

       return view('listings')->with('listings',$listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'email'
        ]);

        $listing=new Listing();
        $listing->user_id=\auth()->id();
        $listing->name=$request->input('name');
        $listing->email=$request->input('email');
        $listing->address=$request->input('address');
        $listing->website=$request->input('website');
        $listing->phone=$request->input('phone');
        $listing->bio=$request->input('bio');

        $listing->save();

        return redirect('/dashboard')->with('success',"Listing created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing=Listing::find($id);
        return view('showlisting')->with('listing',$listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing=Listing::find($id);
        return view('edit')->with('listing',$listing);
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
        //VALIDATE UPDATE FOR NAME & EMAIL
        $this->validate($request,[
            'name'=>'required',
            'email'=>'email'
        ]);

        //APPLY UPDATE
        $listing=Listing::find($id);
        $listing->name=$request->input('name');
        $listing->email=$request->input('email');
        $listing->phone=$request->input('phone');
        $listing->website=$request->input('website');
        $listing->address=$request->input('address');
        $listing->bio=$request->input('bio');
        $listing->user_id=\auth()->id();

        $listing->save();

        //REDIRECT TO DASHBOARD
        return redirect('/dashboard')->with('success','Listing Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing=Listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success','Listing Deleted!');
    }
}

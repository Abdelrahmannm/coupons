<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandRecourse;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return view('all-brands',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields=$request->validate([
            'name'=>"required",
            'url'=>"required",
            'slug'=>'nullable'
        ]);

            if($request->hasFile('logo'))
            {
                $filename = time().'.'.request()->logo->getClientOriginalExtension();
                request()->logo->move(public_path('images'), $filename);
                $fields['path']=$filename;
            }
            $fields['slug']=Str::slug($fields['name'] , "-");
            Brand::create($fields);
            return redirect('add-brand')->with('message', 'Brand Created Successfully!');
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
    public function edit(Brand $brand )
    {
        return view('edit-brand',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $fields=$request->validate([
            'name'=>"required",
            'url'=>"required",
            'slug'=>'nullable'
        ]);

            if($request->hasFile('logo'))
            {
                $filename = time().'.'.request()->logo->getClientOriginalExtension();
                request()->logo->move(public_path('images'), $filename);
                $fields['path']=$filename;
            }
            $brand->update($fields);
            return back()->with('message', 'Brand Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('message', 'Brand Deleted Successfully!');
    }
    public function indexapi()
    {
        return BrandRecourse::collection(Brand::latest()->filter(request(['search']))->get());
    }
}

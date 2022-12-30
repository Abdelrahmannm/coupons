<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\CouponRecourse;
use App\Http\Resources\BrandRecourse;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::all();
        return view('all-coupons',['coupons'=>$coupons]);
    }
    public function brand(Brand $brand)
    {
        return view('all-brand-coupons',['coupons'=>$brand->coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        return view('add-coupon',['brands'=>$brands]);
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
        // 'slug'=>"required",
        'description'=>"required",
        'discount'=>'required',
        'brand_id'=>'required'
        ]);
        $fields['slug']=Str::slug($fields['name'] , "-");
        Coupon::create($fields);
        return redirect('add-coupon')->with('message', 'Coupon Created Successfully!');

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
    public function edit(Coupon $coupon)
    {
        $brands=Brand::all();
        return view('edit-coupon',['brands'=>$brands,'coupon'=>$coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon )
    {
        $fields=$request->validate([
            'name'=>"required",
            // 'slug'=>"required",
            'description'=>"required",
            'discount'=>'required',
            'brand_id'=>'required'
            ]);
            $coupon->update($fields);
            return back()->with('message', 'Coupon Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back()->with('message', 'Coupon Deleted Successfully!');
    }

    public function indexapi()
    {
        return CouponRecourse::collection(Coupon::latest()->filter(request(['search']))->get());
    }
    public function showapi(Brand $brand)
    {
        return BrandRecourse::collection($brand->coupons);
    }

}

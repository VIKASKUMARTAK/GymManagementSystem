<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PackageType;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings=Booking::all();
        return view('bookings.index',['data'=>$bookings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view('bookings.create',['data'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'packageprice'=>'required',
        ]);

        if($request->ref=='front'){
            $sessionData=[
                
                'package_id'=>$request->package_id,
                'checkin_date'=>$request->checkin_date,
                'checkout_date'=>$request->checkout_date,
                'packageprice'=>$request->packageprice,
                'ref'=>$request->ref
            ];
            session($sessionData);
        }else{
            $data=new Booking;
            $data->user_id=$request->user_id;
            $data->package_id=$request->package_id;
            $data->checkin_date=$request->checkin_date;
            $data->checkout_date=$request->checkout_date;
            if($request->ref=='front'){
                $data->ref='front';
            }else{
                $data->ref='admin';
            }
            $data->save();
            return redirect('admin/bookings/create')->with('success','Data has been added.');
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::where('id',$id)->delete();
        return redirect('admin/bookings')->with('success','Data has been deleted.');
    }

    // Check Avaiable packages
    function available_packages(Request $request,$checkin_date){
        $apackages=DB::SELECT("SELECT * FROM packages WHERE id NOT IN (SELECT package_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");

        $data=[];
        foreach($apackages as $package){
            $packageTypes=PackageType::find($package->package_type_id);
            $data[]=['package'=>$package,'packagetype'=>$packageTypes];
        }

        return response()->json(['data'=>$data]);
    }
            
}

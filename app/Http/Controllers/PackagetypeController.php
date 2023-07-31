<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageType;

class PackagetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        $data=PackageType::all();
        
        return view('packagetype.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('packagetype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'detail'=>'required',
        ]); 

        $data=new PackageType;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();

        return redirect('admin/packagetype/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $data=PackageType::find($id);
        return view('packagetype.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data=PackageType::find($id);
        return view('packagetype.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,String $id)
    {
        $data=PackageType::find($id);
        $data->title=$request->title;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();

        return redirect('admin/packagetype/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        packagetype::where('id',$id)->delete();
        return redirect('admin/packagetype')->with('success','Data has been deleted.');
    }
}

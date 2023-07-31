<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageType;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Package::all();
        return view('package.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packagetypes=PackageType::all();
        return view('package.create',['packagetypes'=>$packagetypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'rt_id' => 'required',
            'title' => 'required',
        ]);

        $data=new Package;
        $data->package_type_id=$request->rt_id;
        $data->title=$request->title;
        $data->save();

        return redirect('admin/packages/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Package::find($id);
        return view('package.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $packagetypes=PackageType::all();
        $data=Package::find($id);
        return view('package.edit',['data'=>$data,'packagetypes'=>$packagetypes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=Package::find($id);
        $data->package_type_id=$request->rt_id;
        $data->title=$request->title;
        $data->save();

        return redirect('admin/packages/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        package::where('id',$id)->delete();
        return redirect('admin/packages')->with('success','Data has been deleted.');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Telemedicine;
use Illuminate\Http\Request;
use Image;

class TelemedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Telemedicine::orderBy('id','desc')->get();
        return view('backend.admin.telemedicine.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.telemedicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $data  = new Telemedicine();
        $data->title = $request->title;
        $data->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = $image->getClientOriginalName();
            $filename = preg_replace('/\s+/', '-', $filename);
            $folder = 'uploads/'.date('Y').'/'.date('m');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $feture_img = $folder.'/'. time() . '-' . $filename;
            Image::make($image)->save($feture_img);
            $data->image = asset($feture_img);
           
        }
        $data->save();
        return redirect()->back()->with('message',"Successfully Save");
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
        $data = Telemedicine::find($id);
        return  view('backend.admin.telemedicine.edit',compact('data'));
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
        $validatedData = $request->validate([
            'title' => 'required',
        ]);
        $data  = Telemedicine::find($id);
        $data->title = $request->title;
        $data->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = $image->getClientOriginalName();
            $filename = preg_replace('/\s+/', '-', $filename);
            $folder = 'uploads/'.date('Y').'/'.date('m');
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            $feture_img = $folder.'/'. time() . '-' . $filename;
            Image::make($image)->save($feture_img);
            $data->image = asset($feture_img);
           
        }
        $data->update();
        return redirect()->back()->with('message',"Successfully Save");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Telemedicine::where('id',$id)->delete();
        return redirect()->back()->with('message',"Successfully Deleted");
    }
}

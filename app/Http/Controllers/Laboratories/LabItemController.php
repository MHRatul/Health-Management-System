<?php

namespace App\Http\Controllers\Laboratories;

use App\Http\Controllers\Controller;
use App\LabItem;
use Illuminate\Http\Request;
use Auth;

class LabItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab_items = LabItem::orderBy('id','desc')->get();
        return view('backend.laboratories.lab_item.index',compact('lab_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.laboratories.lab_item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lab = new LabItem();
        $lab->user_id = Auth::user()->id;
        $lab->title = $request->title;
        $lab->status = $request->status;
        $lab->save();
        $notification=array(
            'message' => 'Successfully Saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LabItem::find($id);
        return view('backend.laboratories.lab_item.edit',compact('data'));
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
        $lab = LabItem::find($id);
        $lab->user_id = Auth::user()->id;
        $lab->title = $request->title;
        $lab->status = $request->status;
        $lab->save();
        $notification=array(
            'message' => 'Successfully Saved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LabItem::find($id);
        $data->delete();
        $notification=array(
            'message' => 'Successfully Delete',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}

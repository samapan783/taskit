<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use Image;
use Session;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::all();
        return view('admin.doctor.index')->withDoctors($doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // dd($request);
        $doctor=new Doctor;
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name')
            $doctor->$key=$value;
        }

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='doctor'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/images/doctors/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(300,200)->save($location);
        $doctor->image=$filename;
        $doctor->save();        

        session::flash('success', 'The Doctor Details Has Been Added Successfully!');
        return redirect()->route('doctor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor=Doctor::find($id);
        return view('admin.doctor.show')->withDoctor($doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                        //dd($id);
        $doctor=Doctor::find($id);
        //dd($banner);
        return view("admin.doctor.edit")->withDoctor($doctor);
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
        $doctor=Doctor::find($id);

        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image' & $key!='_method')
            $doctor->$key=$value;
        }

        $image=$request->file('image');

        if($request->hasFile('image')){
        //dd($image);
        $filename='doctor'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/images/doctors/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(300,200)->save($location);
        $doctor->image=$filename;

    }

        $doctor->save();        

        session::flash('success', 'The Doctor details Has Been Updates Successfully!');
        return redirect()->route('doctor.index');

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


    public function delete($id,Request $request)
    {   
        $doctor=Doctor::find($id);
        $doctor->delete();
        $request->session()->flash('success', 'The Doctor Details Has Been Deleted.');
        return redirect('/admin/doctor');
        
        // dd($request); 
    }


}

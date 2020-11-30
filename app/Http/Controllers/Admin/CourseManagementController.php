<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use Session;

class CourseManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        return view('admin.course.index')->withCourses($courses);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->name;
        $coursePresent=Course::where('name',$name)->get();
        if(count($coursePresent)>0)
            foreach ($coursePresent as $value) {
              
                 $value->delete();
            }

        // dd($request['session_name']);
        $eligibility=$request['eligibility'];
        $duration=$request['duration'];
        $name=$request['name'];



        foreach ($request['session_name'] as $key => $value) {
        $course=new Course;
            $session_name=$value; //session_name
            $topic=$request['topic'][$key];
            $des=$request['description'][$key];

            $course->name=$name;
            $course->eligibility=$eligibility;
            $course->duration=$duration;
            $course->session_name=$session_name;
            $course->topic=$topic;
            $course->description=$des;
            $course->status=$request['status'];
            $course->save();
        }

        session::flash('success', 'The Course Details Has Been Updated Successfully!');
        return redirect()->route('course-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $course=Course::where('name',$id)->get();
        // dd($course);
        return view("admin.course.show")->withCourse($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course=Course::where('name',$id)->get();
        // dd($course);
        return view("admin.course.edit")->withCourse($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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

        // dd($id);
        $course=Course::find($id);
        // dd($course->name);
        $cn=Course::where('name',$course->name)->get();
        // dd($cn);
        foreach($cn as $c){
                $c->delete();

        }

        $request->session()->flash('success', 'The Course Details Has Been Deleted.');
        return redirect('/admin/course-management');
        
        // dd($request); 
    }


}

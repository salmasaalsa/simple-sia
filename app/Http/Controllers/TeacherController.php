<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teacher = \App\Teacher::paginate(5);
        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $teacher = \App\Teacher::where('email', 'LIKE', "%$filterKeyword%")->paginate(5);
        }

        return view('admin.teacher.index', ['teacher' => $teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.teacher.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new \App\Teacher;

        $teacher->full_name = $request->get('full_name');
        $teacher->date_of_birth = $request->get('date_of_birth');
        $teacher->place_of_birth = $request->get('place_of_birth');
        $teacher->address = $request->get('address');
        $teacher->phone = $request->get('phone');
        $teacher->email = $request->get('email');
        $teacher->save();


        return redirect()->route('teacher.index')->with('status', 'Student successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = \App\Teacher::findOrFail($id);

        return view('admin.teacher.show', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = \App\Teacher::findOrFail($id);

        return view('admin.teacher.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $teacher = \App\Teacher::findOrFail($id);

        $teacher->full_name = $request->get('full_name');
        $teacher->date_of_birth = $request->get('date_of_birth');
        $teacher->place_of_birth = $request->get('place_of_birth');
        $teacher->address = $request->get('address');
        $teacher->phone = $request->get('phone');
        $teacher->email = $request->get('email');
        $teacher->save();

        return redirect()->route('teacher.index')->with('status', 'User teacher succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = \App\Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('status', 'User student successfully delete');
    }
}

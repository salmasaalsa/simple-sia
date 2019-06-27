<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subject = \App\Subject::paginate(5);
        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $subject = \App\Subject::where('subject', 'LIKE', "%$filterKeyword%")->paginate(5);
        }

        return view('admin.subject.index', ['subject' => $subject]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.subject.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new \App\Subject;
        $subject->subject = $request->get('subject');
        $subject->save();

        return redirect()->route('subject.index')->with('status','Subject successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = \App\Subject::findOrFail($id);
        return view('admin.subject.show', ['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = \App\Subject::findOrFail($id);
        return view('admin.subject.edit', ['subject' => $subject]);
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
        $subject = \App\Subject::findOrFail($id);
        $subject->subject = $request->get('subject');
        $subject->save();

        return redirect()->route('subject.index')->with('status', 'Subject succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = \App\Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subject.index')->with('status', 'Subject successfully delete');
    }
}
